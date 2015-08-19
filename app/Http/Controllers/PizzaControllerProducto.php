<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TamanhoPizza;
use App\EspecialidadPizza;
use App\MasaPizza;
use App\Producto;
use App\DetallePizza;
use App\ConfigPizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Session;
use Redirect;
use Auth;


class PizzaControllerProducto extends Controller {
	protected function crearImagen($inputImagen){

		$imagenInput = $inputImagen;
		$nombre_imagen = $imagenInput->getClientOriginalName();
		$imagenInput->move('img/productos/'.Auth::user()->persona_empresa_codigo,$nombre_imagen);
		$imagen_final = 'img/productos/'.Auth::user()->persona_empresa_codigo.'/'.$nombre_imagen;

		$int_imagen= Image::make($imagen_final);
		$int_imagen->resize(568,null, function($constraint){
			$constraint->aspectRatio();
		});
		$int_imagen->save($imagen_final);
		return $imagen_final;
	}

	protected function crearSelect(){
		$pizzaEspecie = EspecialidadPizza::where('empresa_codigo','=', Auth::user()->persona_empresa_codigo)
			->get();

		$selectEspecie = array();
		foreach ($pizzaEspecie as $pizzaEspecies){
			$selectEspecie[$pizzaEspecies->codigo] = $pizzaEspecies->nombre;
		}
		$pizzaTamanho = TamanhoPizza::all();
		$selectTamanho = array();
		foreach ($pizzaTamanho as $pizzaTamanhos){
			$selectTamanho[$pizzaTamanhos->codigo] = $pizzaTamanhos->nombre;
		}
		$pizzaMasa = MasaPizza::all();
		$selectMasa=array();
		foreach($pizzaMasa as $pizzaMasas){
			$selectMasa[$pizzaMasas->codigo] = $pizzaMasas->nombre;
		}
		return ['selectTamanho'=>$selectTamanho,'selectMasa'=>$selectMasa,'selectEspecie'=>$selectEspecie];
	}
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()

	{
		$listaProd = Producto::join('cat_pizza_config','cat_pizza_config.producto_codigo','=','productos.codigo')
			->join('cat_pizza_especialidades','cat_pizza_especialidades.codigo','=','cat_pizza_config.cat_pizza_esp_codigo')
			->select('cat_pizza_especialidades.nombre as especialidad_nombre','productos.denominacion','productos.descripcion','productos.imagen_url','productos.estado','productos.codigo')
			->where('cat_pizza_especialidades.empresa_codigo', '=', Auth::user()->persona_empresa_codigo)
			->get();
		$DetallePizza = EspecialidadPizza::where('empresa_codigo','=', Auth::user()->persona_empresa_codigo)
			->get();

		$selectDetalle = array();
		foreach ($DetallePizza as $DetallePizzas){
			$selectDetalle[$DetallePizzas->codigo] = $DetallePizzas->nombre;
		}

		return view('admin.PizzaEspecialidad',compact('DetallePizza','selectDetalle','listaProd'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$imagen_final = $this->crearImagen(Input::file('image'));



		$produc = Producto::create([
			'denominacion'=>$request['nombre'],
			'subcategoria_codigo'=>$request['especialidad'],
			'categoria_codigo'=>3,
			'descripcion'=>$request['descrip'],
			'empresa_codigo'=>Auth::user()->persona_empresa_codigo,
			'imagen_url'=>$imagen_final,
			'estado'=>1,

		]);
		ConfigPizza::create([
			'producto_codigo'=>$produc->codigo,
			'cat_pizza_esp_codigo'=>$request['especialidad'],
		]);

		Session::flash('message','Producto creado exitosamente');
		//return Redirect::back();

		return Redirect::to('/PizzaControlProducto/create');

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
		$ProductoPizza = Producto::join('cat_pizza_config','cat_pizza_config.producto_codigo','=','productos.codigo')
			->join('cat_pizza_especialidades','cat_pizza_especialidades.codigo','=','cat_pizza_config.cat_pizza_esp_codigo')
			->select('cat_pizza_especialidades.nombre as especialidad_nombre','productos.denominacion','productos.descripcion','productos.imagen_url','productos.estado','productos.codigo',
				'cat_pizza_especialidades.codigo as especialidad_codigo')
			->find($codigo);

		$selectDetalle = $this->crearSelect();
		$selectDetalle =$selectDetalle['selectEspecie'];

		return view('usuario.edit_Pizza_producto',['ProductoPizza'=>$ProductoPizza, 'selectDetalle'=>$selectDetalle]);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($codigo, Request $request)
	{
		$ProductoPizza = Producto::find($codigo);

		$ProductoPizza->fill($request->all());
		if(isset($request->all()['image']))
			$ProductoPizza->imagen_url = $this->crearImagen(Input::file('image'));
		$ProductoPizza->save();
		ConfigPizza::where('producto_codigo','=',$codigo)
			->update([
				'cat_pizza_esp_codigo'=>$request->all()['especialidad']
			]);
		Session::flash('message','Producto actualizado exitosamente' );
		return Redirect::to('/PizzaControlProducto/create');




	}
	public function update_estado($codigo)
	{
		$estado = Producto::find($codigo);
		$estado->estado=$estado->estado?0:1;
		$estado->save();
		Session::flash('message','Estado actualizado exitosamente');
		return Redirect::to('/PizzaControlProducto/create');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codigo)
	{
		ConfigPizza::where('producto_codigo', '=', $codigo)->delete();
		Producto::destroy($codigo);


		Session::flash('message','Producto eliminado correctamente');
		return Redirect::to('/PizzaControlProducto/create');
	}

}
