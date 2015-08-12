<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Extra;
use Input;

use App\Producto;

class RestProductos extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$productos = Producto::select('codigo', 'denominacion', 'imagen_url', 'descripcion', 'categoria_codigo', 'empresa_codigo',
			'precio')
			->where('estado', '=', 'activo')
		->paginate(10);

		return $productos;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Producto::select('codigo', 'denominacion', 'imagen_url', 'descripcion', 'categoria_codigo', 'empresa_codigo',
			'precio')
			->where('estado', '=', 'activo')
		->find($id);
	}

	/**
	 * Retorna los extras del producto
	 *
	 * @param int $id
	 * @return mixed
	 *
	 */

	public function extras($id){
		return Extra::join('productos', 'productos.subcategoria_codigo', '=', 'producto_sub_extras.subcategoria_codigo')
			->join('productos_extras', 'productos_extras.codigo', '=', 'producto_sub_extras.pextra_codigo')
			->select('productos_extras.nombres', 'producto_sub_extras.precio_extra')
			->where('productos.codigo', '=', $id)
			->get();
	}

}
