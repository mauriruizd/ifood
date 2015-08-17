<?php namespace App\Http\Controllers;

use App\Extra;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductoExtra;
use App\Subcategoria;
use Illuminate\Http\Request;

class RestSubcategorias extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Subcategoria::all();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Subcategoria::find($id);
	}

	public function extras($id){
		return Extra::where('subcategoria_codigo', '=', $id)->get();
	}

	public function productos_extras($id){
		return ProductoExtra::join('producto_sub_extras', 'producto_sub_extras.pextra_codigo', '=', 'productos_extras.codigo')
			->select('productos_extras.codigo', 'productos_extras.nombres', 'producto_sub_extras.precio_extra')
			->where('producto_sub_extras.subcategoria_codigo', '=', $id)
			->get();
	}

}
