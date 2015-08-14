<?php namespace App\Http\Controllers;

use App\Extra;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductoExtra;
use Illuminate\Http\Request;
use App\Empresa;
use App\Producto;
use App\CategoriasEmpresa;
use App\Subcategoria;
use App\EspecialidadPizza;
use Input;

class RestEmpresas extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$ciudad_codigo = Input::has('ciudad') ? Input::get('ciudad') : 1;
		$empresa = Empresa::select('codigo', 'denominacion', 'direccion', 'telefono', 'logo_url') //codigo_delivery 'ciudad_codigo'
		->where('estado', '=', 'activo')
			->where('ciudad_codigo', '=', $ciudad_codigo)
		->get();

		return $empresa;
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Empresa::select('codigo', 'denominacion', 'direccion', 'telefono', 'logo_url') //codigo_delivery 'ciudad_codigo'
		->find($id);
	}

	public function productos($id){
		return Producto::where('empresa_codigo', '=', $id)
			->where('estado', '=', 'activo')
			->get();
	}

	public function categorias($id){
		return CategoriasEmpresa::where('empresa_codigo', '=', $id)->get();
	}

	public function subcategorias($id){
		return Subcategoria::where('empresa_codigo', '=', $id)->get();
	}

	public function extras($id){
		return ProductoExtra::where('empresa_codigo', '=', $id)
			->where('estado', '=', 'activo')->get();
	}

	public function especialidades_pizza($id){
		return EspecialidadPizza::where('empresa_codigo', '=', $id)->get();
	}

}
