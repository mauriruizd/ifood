<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;

use App\DireccionCliente;
use App\Usuario;

class RestDirecciones extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$persona_codigo = Input::query('persona_codigo');

		return DireccionCliente::where('persona_cliente_codigo', '=', $persona_codigo)->get();
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
		$direccion = new DireccionCliente;
		$direccion->persona_cliente_codigo = $datos['persona_cliente_codigo'];
	    $direccion->nombre = $datos['nombre'];
	    $direccion->direccion = $datos['direccion'];
	    $direccion->latitud = $datos['latitud'];
	    $direccion->longitud = $datos['longitud'];
	    return (int)$direccion->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return DireccionCliente::find($id);
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
		$datos = Input::all();
		$direccion = DireccionCliente::find($id);
		isset($datos['nombre']) ? $direccion->nombre = $datos['nombre'] : false;
		isset($datos['direccion']) ? $direccion->direccion = $datos['direccion'] : false;
		isset($datos['longitud']) ? $direccion->longitud = $datos['longitud'] : false;
		isset($datos['latitud']) ? $direccion->latitud = $datos['latitud'] : false;
		return (int)$direccion->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$direccion = DireccionCliente::find($id);
		$direccion->estado = 0;
		return (int)$direccion->save();
	}

}
