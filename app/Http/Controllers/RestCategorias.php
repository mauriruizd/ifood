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
		if(Input::has('n'))
			$n = Input::query('n');
		else
			$n = 5;
		$categorias = Categoria::paginate($n);
		return $categorias->toJSON();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categoria = Categoria::find($id);

		return $categoria->toJSON();
	}

}
