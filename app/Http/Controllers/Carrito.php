<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Redirect;

use App\Producto;
use App\Pedido;
use App\PedidoDetalle;
use App\ArraySort;
use App\Moneda;
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

	public function VistaCarrito(){
		$pedidos = Session::get('carrito');
		//dd($pedidos);
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
					if(!$nPedidoDetalle->save())
						return view('uncatched')->with('error', 'Error a la hora de guardar los detalles de su pedido.');
					$socket_data['pedido'][] = [
						'item' => $nPedidoDetalle->producto_descripcion,
						'cantidad' => $nPedidoDetalle->cantidad,
						'precio' => $nPedidoDetalle->precio,
						'subtotal' => $nPedidoDetalle->subtotal
					];
				}
				$context = new \ZMQContext();
				$socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'pusher');
				$socket->connect("tcp://127.0.0.1:3000");
				$socket->send(json_encode($socket_data));
			} else {
				return view('uncatched')->with('error', 'Error a la hora de guardar su pedido.');
			}
		}
		Session::forget('subtotal');
		Session(['carrito.delivery' => 0, 'carrito.direccion' => 0, 'carrito.items' => array()]);
		return view('uncatched')->with('error', 'Pedido concretado con exito!');
	}

	public function SeleccionarDireccion($id){
		if(Session::has('carrito.direccion')){
			Session(['carrito.direccion' => $id]);
		} else {
			Session::put('carrito.direccion', $id);
		}
		return Redirect::to('carrito/pasotres');
	}

	public function AddProducto($id_producto, $cant=1){
		$producto = Producto::join('persona_empresas', 'productos.empresa_codigo', '=', 'persona_empresas.codigo')
		->select('productos.codigo', 'productos.denominacion', 'productos.empresa_codigo', 'productos.imagen_url', 
			'productos.precio', 'productos.categoria_codigo', 'persona_empresas.costo_delivery', 'persona_empresas.logo_url', 'persona_empresas.slug',
			'persona_empresas.denominacion as empresa_nombre')
		->where('productos.codigo', '=', $id_producto)
		->first();
		$nuevoPedido = array('producto' => $producto, 'cantidad' => $cant);
		Session(['carrito.items.'.$id_producto => $nuevoPedido]);
		$this->UpdateDelivery();

		return Redirect::to('empresas/'.$producto->slug);
	}

	public function AddProductoConfig($id_producto, $cant, $config){
		$producto = Producto::join('persona_empresas', 'productos.empresa_codigo', '=', 'persona_empresas.codigo')
		->select('productos.codigo', 'productos.denominacion', 'productos.empresa_codigo', 'productos.imagen_url', 
			'productos.precio', 'productos.categoria_codigo', 'persona_empresas.costo_delivery', 'persona_empresas.logo_url', 'persona_empresas.slug',
			'persona_empresas.denominacion as empresa_nombre')
		->where('productos.codigo', '=', $id_producto)
		->first();
		if($producto->categoria_codigo == 3){
			$configPizza = DetallePizza::join('cat_pizza_tamanhos', 'cat_pizza_tamanhos.codigo', '=', 'cat_pizza_detalles.cat_pizza_tamanho_codigo')
			->join('cat_pizza_tipo_masa', 'cat_pizza_tipo_masa.codigo', '=', 'cat_pizza_detalles.cat_pizza_masa_codigo')
			->select('cat_pizza_tamanhos.nombre as tamanho_nombre', 'cat_pizza_tipo_masa.nombre as masa_nombre', 'precio', 
				'cat_pizza_detalles.codigo as codigo_detalle')
			->where('cat_pizza_detalles.codigo', '=', $config)
			->first();
			$producto->denominacion .= '(Tamaño '.$configPizza->tamanho_nombre.', masa '.$configPizza->masa_nombre.')';
			$producto->precio = $configPizza->precio;
		}
		//dd($configPizza);
		$nuevoPedido = array('producto' => $producto, 'cantidad' => $cant, 'configExtra' => $config);
		Session(['carrito.items.'.$id_producto => $nuevoPedido]);
		$this->UpdateDelivery();

		return Redirect::to('empresas/'.$producto->slug);
	}

	public function UpdateProducto($id, $qtd){
		$producto = Session::get('carrito.items.'.$id);
		$before = $producto['producto']->precio * $producto['cantidad'];
		Session(['carrito.items.'.$id.".cantidad" => $qtd]);
		$producto = Session::get('carrito.items.'.$id);
		$after = $producto['producto']->precio * $producto['cantidad'];
		$newSubtotal = Session::get('carrito.subtotal') - ($before - $after);
		$returner = Moneda::guaranies($newSubtotal);
	}

	public function RemoveProducto($id_pedido){
		Session::forget("carrito.items.$id_pedido");
		$this->UpdateDelivery();
		return Redirect::to('carrito');
	}

	protected function sortPedidosEmpresa(){
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
