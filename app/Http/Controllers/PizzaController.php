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

class PizzaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.pizza');

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tamanho = TamanhoPizza::paginate(4);//corresponde a el tamanho de la piza
		$masaPizza= MasaPizza::all();

		$pizzaEspecie = EspecialidadPizza::paginate(4);//corresponde a la especialidad de la pizza
		$pizzaTodo = EspecialidadPizza::all();
		$selectEspecie = array();
		foreach ($pizzaTodo as $pizzaEspecies){
			$selectEspecie[$pizzaEspecies->codigo]= $pizzaEspecies->nombre;
		}

		return view('admin.pizza', compact('pizzaEspecie', 'selectEspecie', 'tamanho', 'masaPizza'));
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
	public function TamanhoEspecialidad(EspecialidadRequest $request)
	{
		TamanhoPizza::create([
			'nombre'=>$request['nombre'],
			'cant_porcion'=>$request['cant_porcion'],
			'cant_sabores'=>$request['cant_sabores'],
			'estado'=>1,
		]);
		Session::flash('message','Tamaño creado exitosamente');
		return Redirect::to('pizza/create');
	}

	public function MasaPizzaCreate(EspecialidadRequest $request)
	{
		MasaPizza::create([
			'nombre'=>$request['nombre'],
			'estado'=>1,
		]);
		Session::flash('message','Masa creado exitosamente');
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
	public function edit($codigo)
	{
		$especie = EspecialidadPizza::find($codigo);
		return view('usuario.edit_especialidad',['especie'=>$especie]);

	}
	public function edit_tamanho($codigo)
	{
		$tamanhodelete = TamanhoPizza::find($codigo);
		return view('usuario.edit_tamanho',['tamanhodelete'=>$tamanhodelete]);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($codigo, Request $request)
	{
		$especie = EspecialidadPizza::find($codigo);
		$especie->fill($request->all());
		$especie->save();
		Session::flash('message','Especialidad actualizado exitosamente');
		return Redirect::to('/pizza/create');
	}
	public function update_tamanho($codigo, Request $request)
	{
		$tamanhodelete = TamanhoPizza::find($codigo);
		$tamanhodelete->fill($request->all());
		$tamanhodelete->save();
		Session::flash('message','Tamaño actualizado exitosamente');
		return Redirect::to('/pizza/create');
	}
	public function update_estado($codigo)
	{
		$estado = TamanhoPizza::find($codigo);
		$estado->estado=$estado->estado?0:1;
		$estado->save();
		Session::flash('message','Estado actualizado exitosamente');
		return Redirect::to('/pizza/create');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codigo)
	{
		EspecialidadPizza::destroy($codigo);
		Session::flash('message', 'Especialidad eliminado correctamente');
		return Redirect::to('/pizza/create');
	}
	public function deleteEspecialidad($codigo)
	{
		TamanhoPizza::destroy($codigo);

		Session::flash('message', 'Tamanho eliminado correctamente');
		return Redirect::to('/pizza/create');
	}
	public function deleteMasa($codigo)
	{
		MasaPizza::destroy($codigo);

		Session::flash('message', 'Masa eliminado correctamente');
		return Redirect::to('/pizza/create');
	}


}
