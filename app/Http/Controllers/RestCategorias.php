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
		$n = Input::has('n') ? $n = Input::query('n') : 5;
		$categorias = Categoria::select('codigo', 'nombre', 'imagen_url', 'estado')
		->where('estado', '=', '1')
		->paginate($n);
		return $categorias;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$n = Input::has('n') ? Input::query('n') : 5;
		$categoria = Categoria::join('persona_empresas_categoria', 'categorias.codigo', '=', 'persona_empresas_categoria.categoria_codigo')
		->join('persona_empresas', 'persona_empresas_categoria.empresa_codigo', '=', 'persona_empresas.codigo')
		->where('persona_empresas_categoria.categoria_codigo', '=', $id)
		->paginate($n);

		return $categoria;
	}

}
