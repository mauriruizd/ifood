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
<<<<<<< HEAD
		$n = Input::has('n') ? $n = Input::query('n') : 5;
		$categorias = Categoria::select('codigo', 'nombre', 'imagen_url', 'estado')
		->where('estado', '=', '1')
		->paginate($n);
		return $categorias;
=======
		if(Input::has('n'))
			$n = Input::query('n');
		else
			$n = 5;
		$categorias = Categoria::paginate($n);
		return $categorias->toJSON();
>>>>>>> aed6990a005ca4afd7b757b1e98715bb202f5047
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
		$n = Input::has('n') ? Input::query('n') : 5;
		$categoria = Categoria::join('persona_empresas_categoria', 'categorias.codigo', '=', 'persona_empresas_categoria.categoria_codigo')
		->join('persona_empresas', 'persona_empresas_categoria.empresa_codigo', '=', 'persona_empresas.codigo')
		->where('persona_empresas_categoria.categoria_codigo', '=', $id)
		->paginate($n);

		return $categoria;
=======
		$categoria = Categoria::find($id);

		return $categoria->toJSON();
>>>>>>> aed6990a005ca4afd7b757b1e98715bb202f5047
	}

}
