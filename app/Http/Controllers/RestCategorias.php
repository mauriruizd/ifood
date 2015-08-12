<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Categoria;

class RestCategorias extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Categoria::select('codigo', 'nombre', 'imagen_url', 'estado')
		->where('estado', '=', '1')
		->get();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Categoria::select('codigo', 'nombre', 'imagen_url', 'estado')
		->find($id);
	}

}
