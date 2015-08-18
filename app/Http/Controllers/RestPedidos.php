<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Input;
use App\Http\Controllers\Controller;

use App\Pedido;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class RestPedidos extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Input::has('persona_codigo')){
			return new Response(null, 401);
		}
		$user_id = Input::query('persona_codigo');

		return Pedido::where('persona_cliente_codigo', '=', $user_id)
			->select('codigo', 'direccion_codigo', 'empresa_codigo',
				'importe_total', 'estado', 'fecha_registro', 'fecha_ultmod')
			->get();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$pedido = Input::all();
		if(empty($pedido)){
			return new Response(null, 501);
		}
		$items = json_decode($pedido['items']);
		dd($pedido['items']);
		$persona_cliente_codigo = $pedido['persona_cliente_codigo'];
		$direccion_codigo = $pedido['direccion_codigo'];
		$nPedido = new Pedido;
		$nPedido->persona_cliente_codigo = $persona_cliente_codigo;
		$nPedido->direccion_codigo = $direccion_codigo;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
