<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Subcategoria;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

use Session;
use Redirect;
use Auth;

class LomitoController extends Controller{

	protected function crearImagen($inputImagen){


		$imagenInput = $inputImagen;
		$nombre_image = $imagenInput->getClientOriginalName();
		$imagenInput->move('img/productos/'.Auth::user()->persona_empresa_codigo,$nombre_image);
		$imagen_final = 'img/productos/'.Auth::user()->persona_empresa_codigo.'/'.$nombre_image;

		$int_imagen= Image::make($imagen_final);
		$int_imagen->resize(568,null, function($constraint){
			$constraint->aspectRatio();
		});
		$int_imagen->save($imagen_final);
		return $imagen_final;
	}

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$lomitoProducto = Producto::join('subcategorias','subcategorias.codigo','=','productos.subcategoria_codigo')
			->select('subcategorias.nombre as subcat_nombre','productos.denominacion','productos.descripcion','productos.precio','productos.imagen_url','productos.estado','productos.codigo')
			->where('subcategorias.categoria_codigo', '=', 2)
			->where('subcategorias.empresa_codigo','=', Auth::user()->persona_empresa_codigo)->paginate(4);

			//->get();

			//->where('categoria_codigo', '=', 2)->paginate(4);

		$lomito = Subcategoria::where('empresa_codigo', '=', Auth::user()->persona_empresa_codigo)
			->where('categoria_codigo', '=', 2)
			->get();

		$selectLomito = array();
		foreach ($lomito as $lomitos) {
			$selectLomito[$lomitos->codigo] = $lomitos->nombre;
		}

		return view('admin.LomitoView', compact('lomito','selectLomito','lomitoProducto'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(is_null(Input::file('image'))){
			$imagen_final = 'img/productos/vacio.jpg';
		} else{
			$imagen_final = $this->crearImagen(Input::file('image'));
		}

		Producto::create([
			'denominacion'=>$request['nombre'],
			'subcategoria_codigo'=>$request['especialidad'],
			'categoria_codigo'=>2,
			'descripcion'=>$request['descrip'],
			'empresa_codigo'=>Auth::user()->persona_empresa_codigo,
			'imagen_url'=>$imagen_final,
			'precio'=>$request['precio'],
			'estado'=>1,

		]);
		Session::flash('message','Producto creado correctamente');
		return Redirect::to('/LomitoControl/create');
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
	public function update_estado($codigo)
	{

		$estado = Producto::find($codigo);
		$estado->estado=$estado->estado?0:1;
		$estado->save();
		Session::flash('message','Estado actualizado exitosamente');
		return Redirect::to('/LomitoControl/create');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codigo)
	{
		Producto::destroy($codigo);
		Session::flash('message','Producto eliminado correctamente');
		return Redirect::to('/LomitoControl/create');
	}

}
