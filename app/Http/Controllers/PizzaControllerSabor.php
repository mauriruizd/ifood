<?php namespace App\Http\Controllers;

use App\TamanhoPizza;
use App\EspecialidadPizza;
use App\MasaPizza;

use App\Http\Requests;
use App\Http\Requests\EspecialidadRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;
use Illuminate\Routing\Route;

class PizzaControllerSabor extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$PizzaEspecialidad = EspecialidadPizza::paginate(4);
		return view('admin.PizzaEspecialidad', compact('PizzaEspecialidad'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$PizzaEspecialidad = EspecialidadPizza::paginate(4);
		return view('admin.PizzaSabor', compact('PizzaEspecialidad'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EspecialidadRequest $request)
	{
		EspecialidadPizza::create([
			'nombre'=>$request['nombre'],

			'empresa_codigo'=>Auth::user()->persona_empresa_codigo,
			//'roles'=> $request['activo'],
		]);

		Session::flash('message','Especialidad creado exitosamente');
		return Redirect::to('pizza/create');
		
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