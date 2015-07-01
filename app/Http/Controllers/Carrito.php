<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Redirect;

use App\Producto;
use App\Pedido;
use App\ArraySort;
use App\DireccionCliente;

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
			$total += $casa['grupo'][0]['costo_delivery'];
		}
		Session(['carrito.delivery' => $total]);
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
			'productos.precio', 'persona_empresas.costo_delivery', 'persona_empresas.logo_url', 'persona_empresas.slug')
		->where('productos.codigo', '=', $id_producto)
		->first();
		$nuevoPedido = array('producto' => $producto, 'cantidad' => $cant);
		Session(['carrito.items.'.$id_producto => $nuevoPedido]);
		$this->UpdateDelivery();

		return Redirect::to('empresas/'.$producto->slug);
	}

	public function RemoveProducto($id_pedido){
		Session::forget("carrito.items.$id_pedido");
		$this->UpdateDelivery();
		return Redirect::to('carrito');
	}

}
