<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Ciudad;

class RestCiudades extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Ciudad::select('codigo', 'nombre', 'imagen_url')->where('estado', '=', 1)->get();
	}

	public function show($id)
	{
		return Ciudad::select('codigo', 'nombre', 'imagen_url')->where('estado', '=', 1)->find($id);
	}


}
