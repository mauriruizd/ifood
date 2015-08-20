<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class LomitoController extends Controller {

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

		$lomito = Producto::where('empresa_codigo', '=', Auth::user()->persona_empresa_codigo);
		return view('admin.LomitoView', compact('lomito'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		Producto::create([
			'denominacion'=>$request['nombre'],
			'subcategoria_codigo'=>$request['especialidad'],
			'categoria_codigo'=>2,
			'descripcion'=>$request['descrip'],
			'empresa_codigo'=>Auth::user()->persona_empresa_codigo,
			//'imagen_url'=>$imagen_final,
			'estado'=>1,

		]);
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
