<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Empresa;
use Input;

class RestEmpresas extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
<<<<<<< HEAD
		$n = Input::has('n') ? $n = Input::query('n') : 5;
		$empresa = Empresa::select('codigo', 'denominacion', 'direccion', 'telefono', 'logo_url')
		->where('estado', '=', 'activo')
		->paginate($n);

		return $empresa;
=======
		if(Input::has('n'))
			$n = Input::query('n');
		else
			$n = 5;
		$empresa = Empresa::select('nombre', 'direccion', 'telefono', 'imagen_url')
		->paginate($n);

		return $empresa->toJSON();
>>>>>>> aed6990a005ca4afd7b757b1e98715bb202f5047
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
<<<<<<< HEAD
		return Empresa::find($id);
=======
		//
>>>>>>> aed6990a005ca4afd7b757b1e98715bb202f5047
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
