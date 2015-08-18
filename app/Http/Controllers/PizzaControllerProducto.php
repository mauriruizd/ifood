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

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
		$DetallePizza = EspecialidadPizza::where('empresa_codigo','=', Auth::user()->persona_empresa_codigo)
			->get();

		$selectDetalle = array();
		foreach ($DetallePizza as $DetallePizzas){
			$selectDetalle[$DetallePizzas->codigo] = $DetallePizzas->nombre;
		}

		return view('admin.PizzaEspecialidad',compact('DetallePizza','selectDetalle'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		$imagenInput = Input::file('image');
		$nombre_imagen = $imagenInput->getClientOriginalName();
		$imagenInput->move('admin.imagen',$nombre_imagen);
		$imagen_final = 'admin.imagen/'.$nombre_imagen;

		$int_imagen= Image::make($imagen_final);
		$int_imagen->resize(568,null, function($constraint){
			$constraint->aspectRatio();
		});
		$int_imagen->save($imagen_final);


		$produc = Producto::create([
			'denominacion'=>$request['nombre'],
			'subcategoria_codigo'=>$request['especialidad'],
			'categoria_codigo'=>3,
			'descripcion'=>$request['descrip'],
			'empresa_codigo'=>Auth::user()->persona_empresa_codigo,
			'imagen_url'=>$imagen_final,

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
	public function edit($id)
	{

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
