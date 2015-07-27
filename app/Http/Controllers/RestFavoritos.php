<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;

use App\Favorito;

class RestFavoritos extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$persona_codigo = Input::query('persona_codigo');

		return Favorito::where('favoritos_persona_cliente_codigo', '=', $persona_codigo)
		->where('activo', '=', '1')
		->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$datos = Input::all();
		$favorito = new Favorito;
		$favorito->favoritos_persona_cliente_codigo = $datos['persona_cliente_codigo'];
		$favorito->favoritos_producto_codigo = $datos['persona_cliente_codigo'];
		$favorito->favoritos_empresa_codigo = $datos['persona_cliente_codigo'];
	    return (int)$favorito->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Favorito::join('productos', 'productos.codigo', '=', 'favoritos_producto_codigo')
		->find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$favorito = Favorito::find($id);
		$favorito->activo = 0;
		return (int)$favorito->save();
	}

}
