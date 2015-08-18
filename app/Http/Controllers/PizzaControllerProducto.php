<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TamanhoPizza;
use App\EspecialidadPizza;
use App\MasaPizza;
use App\Producto;
use App\DetallePizza;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class PizzaControllerProducto extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$DetallePizza = EspecialidadPizza::where('empresa_codigo','=', Auth::user()->persona_empresa_codigo)
			->get();

		$selectDetalle = array();
		foreach ($DetallePizza as $DetallePizzas){
			$selectDetalle[$DetallePizzas->codigo] = $DetallePizzas->nombre;
		}

		return view('admin.PizzaEspecialidad',compact('DetallePizza','selectDetalle'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
