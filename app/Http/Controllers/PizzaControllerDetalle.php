<?php namespace App\Http\Controllers;

use App\TamanhoPizza;
use App\EspecialidadPizza;
use App\MasaPizza;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class PizzaControllerDetalle extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pizzaEspecie = EspecialidadPizza::all();
		$selectEspecie = array();
		foreach ($pizzaEspecie as $pizzaEspecies){
			$selectEspecie[$pizzaEspecies->codigo] = $pizzaEspecies->nombre;
		}
		$pizzaTamanho = TamanhoPizza::all();
		$selectTamanho = array();
		foreach ($pizzaTamanho as $pizzaTamanhos){
			$selectTamanho[$pizzaTamanhos->codigo] = $pizzaTamanhos->nombre;
		}
		$pizzaMasa = MasaPizza::all();
		$selectMasa=array();
		foreach($pizzaMasa as $pizzaMasas){
			$selectMasa[$pizzaMasas->codigo] = $pizzaMasas->nombre;
		}

		return view('admin.PizzaDetalle', compact('pizzaEspecie','selectEspecie','pizzaTamanho','selectTamanho','pizzaMasa','selectMasa'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

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
