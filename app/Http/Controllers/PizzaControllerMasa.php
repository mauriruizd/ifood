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

class PizzaControllerMasa extends Controller {

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
		$masaPizza = MasaPizza::paginate(4);
		return view('admin.PizzaMasa', compact('masaPizza'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Request  $request)
	{
		MasaPizza::create([
			'nombre'=>$request['nombre'],
		    'estado'=>1,
		]);

	Session::flash('message', 'Masa creado Exitosamente');
		return Redirect::to('/PizzaControlMasa/create');
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
		$masaPizza = MasaPizza::find($codigo);
		return view('usuario.edit_masa',['masaPizza'=>$masaPizza]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($codigo, Request $request)
	{
		$masaPizza = MasaPizza::find($codigo);
		$masaPizza->fill($request->all());
		$masaPizza->save();
		Session::flash('message','Masa actualizado exitosamente' );
		return Redirect::to('/PizzaControlMasa/create');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codigo)
	{
		$masaPizza = MasaPizza::destroy($codigo);
		Session::flash('message','Masa Eliminado exitosamente' );
		return Redirect::to('/PizzaControlMasa/create');
	}

}
