<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\PedidoDetalle;
use App\PedidoDetalleExtra;
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
		/*$pedidoFake = [
			'persona_cliente_codigo' => 1,
			'direccion_codigo' => 5,
			'items' => [
				[
					'empresa_codigo' => 11,
					'producto_codigo' => 5,
					'producto_descripcion' => 'Hamburguesa Chica',
					'cantidad' => 1,
					'precio' => 50000,
					'subtotal' => 50000,
					'extras' => [
						[
							'producto_subextra_codigo' => 1,
							'producto_extra_precio' => 5000,
						]
					]
				],
				[
					'empresa_codigo' => 11,
					'producto_codigo' => 9,
					'producto_descripcion' => 'Pizza Cuatro Quesos (sin salsa roja)',
					'cantidad' => 8,
					'precio' => 20000,
					'subtotal' => 160000,
					'extras' => [
					],
				],
				[
					'empresa_codigo' => 12,
					'producto_codigo' => 6,
					'producto_descripcion' => 'Hamburguesa Grande',
					'cantidad' => 1,
					'precio' => 5000,
					'subtotal' => 5000,
					'extras' => [
						[
							'producto_subextra_codigo' => 9,
							'producto_extra_precio' => 200,
						],
						[
							'producto_subextra_codigo' => 8,
							'producto_extra_precio' => 1200,
						]
					],
				]
			],
		];
		dd(json_encode($pedidoFake));*/
		$pedido = Input::all();
		if(empty($pedido)){
			return new Response(null, 501);
		}
		if(!isset($pedido['persona_cliente_codigo']) || !isset($pedido['direccion_codigo']))
			return new Response(null, 501);
		$obj = json_decode($pedido['items']);
		$pedidosXEmpresa = $this->sortPedidos($obj->items);
		//dd($pedidosXEmpresa);
		$persona_cliente_codigo = $pedido['persona_cliente_codigo'];
		$direccion_codigo = $pedido['direccion_codigo'];
		foreach($pedidosXEmpresa as $empresa => $pedidoEmpresa){
			$nPedido = new Pedido;
			$nPedido->persona_cliente_codigo = $persona_cliente_codigo;
			$nPedido->direccion_codigo = $direccion_codigo;
			$nPedido->empresa_codigo = $empresa;
			$nPedido->importe_total = $pedidoEmpresa['total'];
			$nPedido->estado = "llegado";
			if(!$nPedido->save())
				return new Response('Error al guardar pedido', 500);
			foreach($pedidoEmpresa['items'] as $detalle){
				$nDetalle = new PedidoDetalle;
				$nDetalle->pedido_codigo = $nPedido->codigo;
				$nDetalle->producto_codigo = $detalle->producto_codigo;
				$nDetalle->producto_descripcion = $detalle->producto_descripcion;
				$nDetalle->cantidad = $detalle->cantidad;
				$nDetalle->precio = $detalle->precio;
				$nDetalle->subtotal = $detalle->precio * $detalle->cantidad;
				if(!$nDetalle->save())
					return new Response('Error al guardar detalle del pedido', 500);
				foreach ($detalle->extras as $extra) {
					$nExtra = new PedidoDetalleExtra;
					$nExtra->pdetalle_codigo = $nDetalle->codigo;
					$nExtra->producto_subextra_codigo = $extra->producto_subextra_codigo;
					$nExtra->producto_extra_precio = $extra->producto_extra_precio;
					if (!$nExtra->save())
						return new Response('Error al guardar extra del detalle', 500);
				}
			}
		}
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

	private function sortPedidos($items){
		$ordenados = [];
		foreach($items as $pedido){
			if(!isset($ordenados[$pedido->empresa_codigo])){
				$ordenados[$pedido->empresa_codigo]['total'] = 0;
			}
			$ordenados[$pedido->empresa_codigo]['items'][] = $pedido;
			$ordenados[$pedido->empresa_codigo]['total'] += $pedido->precio * $pedido->cantidad;
		}
		return $ordenados;
	}

}
