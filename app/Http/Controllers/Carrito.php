<?php namespace App\Http\Controllers;

use App\Commands\EnviarSocket;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Queue;
use Input;

use App\Producto;
use App\Pedido;
use App\PedidoDetalle;
use App\PedidoDetalleExtra;
use App\ArraySort;
use App\Moneda;
use App\Extra;
use App\Empresa;
use App\DireccionCliente;
use App\DetallePizza;

class Carrito extends Controller {

	public function UpdateDelivery(){
		if(count(Session::get('carrito.items')) == 0){
			Session(['carrito.delivery' => 0]);
			return false;
		}
		$casas;
		foreach(Session::get('carrito.items') as $item){
			$casas[] = $item['producto'];
		}
		$casas = ArraySort::group(json_decode(json_encode($casas), true), 'empresa_codigo');
		$total = 0;
		foreach($casas as $casa){
			if(!Session::has('carrito.delivery.'.$casa['grupo'][0]['empresa_nombre'])){
				Session(['carrito.delivery.'.$casa['grupo'][0]['empresa_nombre'] => $casa['grupo'][0]['costo_delivery']]);
			}
			$total += $casa['grupo'][0]['costo_delivery'];
		}
		if(Session::has('carrito.delivery.total')){
			Session::forget('carrito.delivery.total');
		}
		Session(['carrito.delivery.total' => $total]);
	}

	private function getSubtotal(){
		$items = Session::get('carrito.items');
		$subtotal = 0;
		foreach($items as $item){
			$subtotal += $item['cantidad']*$item['producto']->precio;
		}
		$total = Session::get('carrito.delivery.total') + $subtotal;
		if(Input::has('frmt') && Input::query('frmt')=='true'){
			$subtotal = Moneda::guaranies($subtotal);
			$total = Moneda::guaranies($total);
		}
		return ['subtotal' => $subtotal, 'total'=> $total];
	}

	public function VistaCarrito(){
		Session(['carrito.subtotal' => $this->getSubtotal()['subtotal']]);
		$pedidos = Session::get('carrito');
		return view('food.carrito', compact('pedidos'));
	}

	public function PasoDos(){
		$direcciones = DireccionCliente::where('persona_cliente_codigo', '=', Session::get('hungry_user')->codigo)
		->get();
		return view('food.carrito_pasodos', compact('direcciones'));
	}

	public function PasoTres(){
		$items = 0;
		foreach(Session::get('carrito.items') as $item){
			$items += 1 * $item['cantidad'];
		}
		$datos = array('subtotal' => Session::get('carrito.subtotal'), 'delivery' => Session::get('carrito.delivery'));
		$direccion = DireccionCliente::select('direccion')
		->where('codigo', '=', Session::get('carrito.direccion'))
		->first();
		return view('food.carrito_pasotres', compact('datos', 'direccion', 'items'));
	}

	public function Commit(){
		$pedidosXEmpresa = $this->sortPedidosEmpresa();
		foreach($pedidosXEmpresa as $empresa_codigo => $pedido){
			$nPedido = new Pedido;
			$nPedido->persona_cliente_codigo = Session::get('hungry_user')->codigo;
			$nPedido->direccion_codigo = Session::get('carrito.direccion');
			$nPedido->importe_total = ($pedido['subtotal'] + $pedido['delivery']);
			$nPedido->empresa_codigo = $empresa_codigo;
			$nPedido->estado = 'llegado';
			if($nPedido->save()){
				$empresa = Empresa::select('socket_server_token')->find($nPedido->empresa_codigo);
				$socket_data = [
					'empresa' => $empresa->socket_server_token,
					'user_id' => $nPedido->persona_cliente_codigo,
					'direccion_id' => $nPedido->direccion_codigo,
					'timestamps' => date("d-m-Y H:i:s"),
					'total' => Moneda::guaranies($nPedido->importe_total),
					'pedido' => array()
				];
				foreach($pedido['items'] as $item){
					$nPedidoDetalle = new PedidoDetalle;
					$nPedidoDetalle->pedido_codigo = $nPedido->codigo;
					$nPedidoDetalle->producto_codigo = $item['producto']->codigo;
					$nPedidoDetalle->producto_descripcion = $item['producto']->denominacion;
					$nPedidoDetalle->cantidad = $item['cantidad'];
					$nPedidoDetalle->precio = $item['producto']->precio;
					$nPedidoDetalle->subtotal = ($item['cantidad'] * $item['producto']->precio);
					if(!$nPedidoDetalle->save()) {
						return view('uncatched')->with('error', 'Error a la hora de guardar los detalles de su pedido.');
					}
					if(!is_null($item['configExtra'])) {
						foreach ($item['configExtra']['extras'] as $extra) {
							$nDetalleExtra = new PedidoDetalleExtra;
							$nDetalleExtra->pdetalle_codigo = $nPedidoDetalle->codigo;
							$nDetalleExtra->producto_subextra_codigo = $extra->codigo;
							$nDetalleExtra->producto_extra_precio = $extra->precio_extra;
							$nDetalleExtra->save();
							$extra->precio_extra = Moneda::guaranies((double)$extra->precio_extra);
						}
					}
					$socket_data['pedido'][] = [
						'item' => $nPedidoDetalle->producto_descripcion,
						'cantidad' => $nPedidoDetalle->cantidad,
						'precio' => Moneda::guaranies($nPedidoDetalle->precio),
						'subtotal' => Moneda::guaranies($nPedidoDetalle->subtotal),
						'extras' => $item['configExtra']['extras']
					];
				}
				Queue::push(new EnviarSocket($socket_data));
			} else {
				return view('uncatched')->with('error', 'Error a la hora de guardar su pedido.');
			}
		}
		Session::forget('subtotal');
		Session(['carrito.delivery' => 0, 'carrito.direccion' => 0, 'carrito.items' => array()]);
		return Redirect::to('inicio')->with('msg', 'Pedido concretado con exito!');
	}

	public function SeleccionarDireccion(){
		$datos = Input::all();
		if(!isset($datos['direccion'])){
			return Redirect::back()->with('msg', 'Seleccione una direccion');
		}
		if(Session::has('carrito.direccion')){
			Session(['carrito.direccion' => $datos['direccion']]);
		} else {
			Session::put('carrito.direccion', $datos['direccion']);
		}
		return Redirect::to('carrito/pasotres');
	}

	public function Add(){
		$nuevoProd = Input::all();
		$id = $nuevoProd['id_prod'];
		$cant = $nuevoProd['spinner-value'];
		$lista_extras = isset($nuevoProd['extras']) ? $nuevoProd['extras'] : [];
		$sabores_extras = isset($nuevoProd['sabores_extra']) ? $nuevoProd['sabores_extra'] : [];
		//dd($nuevoProd);
		unset($nuevoProd['id_prod']);
		unset($nuevoProd['_token']);
		unset($nuevoProd['spinner-value']);
		$extras = [
			'nombre' => '',
			'precio' => 0,
			'extras' => []
		];
		$producto = Producto::join('persona_empresas', 'productos.empresa_codigo', '=', 'persona_empresas.codigo')
			->select('productos.codigo', 'productos.denominacion', 'productos.empresa_codigo', 'productos.imagen_url',
				'productos.precio', 'productos.categoria_codigo', 'persona_empresas.costo_delivery', 'persona_empresas.logo_url', 'persona_empresas.slug',
				'persona_empresas.denominacion as empresa_nombre')
			->where('productos.codigo', '=', $id)
			->first();
		$nuevoPedido = array('producto' => $producto, 'cantidad' => $cant, 'configExtra' => null);
		if(count($nuevoProd) !== 0){
			foreach($sabores_extras as $sabor_extra){
				$producto->denominacion .= ', '.Producto::select('denominacion')->find($sabor_extra)->denominacion;
			}
			if(isset($nuevoProd['config_pizza'])){
				$configPizza = $this->ConfigPizza($nuevoProd['config_pizza']);
				$producto->denominacion .= $configPizza['denominacion'];
				$producto->precio = $configPizza['precio'];
				$nuevoPedido['configPizza'] = $nuevoProd['config_pizza'];
				unset($nuevoProd['config_pizza']);
			}
			$count = 1;
			foreach($lista_extras as $configs){
				$extra = $this->GetExtra($configs);
				if(!is_null($extra)){
					$extras['nombre'] .= $extra->nombres;
					$extras['precio'] += $extra->precio_extra;
					$extras['extras'][] = $extra;
					if ($count < count($lista_extras)){
						$extras['nombre'] .= ' + ';
					}
					$count++;
				}
			}
			if(!is_null($lista_extras)){
				$nuevoPedido['configExtra'] = $extras;
				$producto->precio += $extras['precio'];
			}
		}
		if($nuevoPedido['producto']->precio == 0){
			return Redirect::back()->with('error', 'Seleccione configuracion');
		}
		Session(['carrito.items.'.$id => $nuevoPedido]);
		$this->UpdateDelivery();
		return Redirect::to('empresas/'.$producto->slug)->with('msg', 'Producto agregado con exito');
	}
	/*---------CONFIGURACIONES POR CATEGORIA-----------*/

	private function ConfigPizza($id_config){
		$configPizza = DetallePizza::join('cat_pizza_tamanhos', 'cat_pizza_tamanhos.codigo', '=', 'cat_pizza_detalles.cat_pizza_tamanho_codigo')
			->join('cat_pizza_tipo_masa', 'cat_pizza_tipo_masa.codigo', '=', 'cat_pizza_detalles.cat_pizza_masa_codigo')
			->select('cat_pizza_tamanhos.nombre as tamanho_nombre', 'cat_pizza_tipo_masa.nombre as masa_nombre', 'precio',
				'cat_pizza_detalles.codigo as codigo_detalle')
			->where('cat_pizza_detalles.codigo', '=', $id_config)
			->first();
		$config = [
			'denominacion' => '( Tamaño '.$configPizza->tamanho_nombre.', masa '.$configPizza->masa_nombre.')',
			'precio' => $configPizza->precio
		];
		return $config;
	}

	private function GetExtra($id_extra){
		$Extra = Extra::join('productos_extras', 'productos_extras.codigo', '=', 'producto_sub_extras.pextra_codigo')
			->select('producto_sub_extras.precio_extra', 'productos_extras.nombres', 'producto_sub_extras.codigo')
			->find($id_extra);
		return $Extra;
	}

	/*--------FIN CONFIGURACIONES POR CATEGORIA---------*/

	public function LastPedidoDetallado($id){
		$pedido = Pedido::where('persona_cliente_codigo', '=', Session::get('hungry_user')->codigo)->orderBy('codigo', 'DESC')->first();
		$pedido['detalle'] = $pedido->detalle;
		$pedido['detalle']['extras'] = $pedido['detalle']->extras;
		return $pedido;

	}

	public function UpdateProducto($id, $qtd){
		Session(['carrito.items.'.$id.".cantidad" => $qtd]);
		return $this->getSubtotal();
	}

	public function RemoveProducto($id_pedido){
		Session::forget("carrito.items.$id_pedido");
		$this->UpdateDelivery();
		return Redirect::to('carrito');
	}

	private function sortPedidosEmpresa(){
		$empresas = array();
		$carrito = Session::get('carrito');
		foreach($carrito['items'] as $key => $item){
			if(!array_key_exists($item['producto']->empresa_codigo, $empresas)){
				$empresas[$item['producto']->empresa_codigo]['subtotal'] = 0;
				$empresas[$item['producto']->empresa_codigo]['delivery'] = $item['producto']->costo_delivery;
				$empresas[$item['producto']->empresa_codigo]['items'] = array();
			}
			$empresas[$item['producto']->empresa_codigo]['items'][] = $item;
			$empresas[$item['producto']->empresa_codigo]['subtotal'] += ($item['producto']->precio * $item['cantidad']);
		}
		return $empresas;
	}

}
