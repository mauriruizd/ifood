<?php namespace App\Http\Controllers;

use App\ConfigPizza;
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

	public function productos_subcategorias($id_empresa, $id_subcat){
		return Producto::select('codigo', 'denominacion', 'imagen_url', 'descripcion', 'categoria_codigo', 'empresa_codigo',
			'precio')
			->where('estado', '=', 'activo')
			->where('empresa_codigo', '=', $id_empresa)
			->where('subcategoria_codigo', '=', $id_subcat)
			->get();
	}

	public function extras($id){
		return ProductoExtra::where('empresa_codigo', '=', $id)
			->where('estado', '=', 'activo')->get();
	}

	public function especialidades_pizza($id){
		return EspecialidadPizza::where('empresa_codigo', '=', $id)->get();
	}

	public function configuraciones_pizza($id){
		return ConfigPizza::join('cat_pizza_especialidades', 'cat_pizza_especialidades.codigo', '=', 'cat_pizza_config.cat_pizza_esp_codigo')
			->select('cat_pizza_config.codigo', 'cat_pizza_config.producto_codigo', 'cat_pizza_config.cat_pizza_esp_codigo')
			->where('cat_pizza_especialidades.empresa_codigo', '=', $id)
			->get();
	}

}
