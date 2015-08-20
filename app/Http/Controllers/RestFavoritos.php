<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
		->where('estado', '=', 1)
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
		$favorito = Favorito::where('favoritos_persona_cliente_codigo', '=', $datos['persona_cliente_codigo'])
			->where('favoritos_producto_codigo', '=', $datos['producto_codigo'])->first();
		if(!is_null($favorito)){
			$favorito->estado = 1;
			$favorito->save();
			return new Response(null, 200);
		}
		$favorito = new Favorito;
		$favorito->favoritos_persona_cliente_codigo = $datos['persona_cliente_codigo'];
		$favorito->favoritos_producto_codigo = $datos['producto_codigo'];
		$favorito->favoritos_empresa_codigo = $datos['empresa_codigo'];
		$favorito->estado = 1;
	    $favorito->save();
		return new Response(null, 200);
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
			->where('estado', '=', 1)
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
		$favorito->estado = 0;
		$favorito->save();
		return new Response(null, 200);
	}

}
