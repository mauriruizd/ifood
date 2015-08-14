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

class PizzaControllerTamanho extends Controller {

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
		$PizzaTamanho = TamanhoPizza::paginate(4);
		return view('admin.PizzaTamanho', compact('PizzaTamanho'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(EspecialidadRequest $request)
	{
		TamanhoPizza::create([
			'nombre'=>$request['nombre'],
			'cant_porcion'=>$request['cant_porcion'],
			'cant_sabores'=>$request['cant_sabores'],
			'estado'=>1,
		]);
		Session::flash('message','Tamaño creado exitosamente');
		return Redirect::to('PizzaControlTamanho/create');
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
		$tamanhodelete = TamanhoPizza::find($codigo);
		$tamanhodelete->fill($request->all());
		$tamanhodelete->save();
		Session::flash('message','Tamanho actualizado exitosamente');
		return Redirect::to('PizzaControlTamanho/create');
	}
	public function update_estado($codigo, Request $request)
	{
		$estado = TamanhoPizza::find($codigo);
		$estado->estado=$estado->estado?0:1;
		$estado->save();
		Session::flash('message','Estado actualizado exitosamente');
		return Redirect::to('PizzaControlTamanho/create');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codigo)
	{
		TamanhoPizza::destroy($codigo);

		Session::flash('message', 'Tamanho eliminado correctamente');
		return Redirect::to('/PizzaControlTamanho/create');
	}

}
