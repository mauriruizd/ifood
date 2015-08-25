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

class ProductoController extends Controller{
	protected $routes;
	protected $categoria;
	protected $formRoute;
	protected  function empresa(){
		return Auth::user()->persona_empresa_codigo;
	}

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
			->where('subcategorias.categoria_codigo', '=', $this->categoria)
			->where('subcategorias.empresa_codigo','=', $this->empresa())->paginate(4);

			//->get();

			//->where('categoria_codigo', '=', 2)->paginate(4);

		$lomito = Subcategoria::where('empresa_codigo', '=', $this->empresa())
			->where('categoria_codigo', '=', $this->categoria)
			->get();

		$selectLomito = array();
		foreach ($lomito as $lomitos) {
			$selectLomito[$lomitos->codigo] = $lomitos->nombre;
		}

		return view('admin.LomitoView', ['routes'=>$this->routes, 'formRoute'=>$this->formRoute,'lomito'=>$lomito,'selectLomito'=>$selectLomito,'lomitoProducto'=>$lomitoProducto]);
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
			'categoria_codigo'=>$this->categoria,
			'descripcion'=>$request['descrip'],
			'empresa_codigo'=>$this->empresa(),
			'imagen_url'=>$imagen_final,
			'precio'=>$request['precio'],
			'estado'=>1,

		]);
		Session::flash('message','Producto creado correctamente');
		return Redirect::to($this->formRoute.'/create');
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
		$producto = Producto::find($codigo);
		$lomito = Subcategoria::where('empresa_codigo', '=', $this->empresa())
			->where('categoria_codigo', '=', $this->categoria)
			->get();

		$selectLomito = array();
		foreach ($lomito as $lomitos) {
			$selectLomito[$lomitos->codigo] = $lomitos->nombre;
		}
		return view('usuario.edit_producto_generico', ['formRoute'=>$this->formRoute, 'routes'=>$this->routes, 'producto'=>$producto, 'selectLomito'=>$selectLomito]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $codigo)
	{
		$producto = Producto::find($codigo);
		$producto->fill($request->all());
		if(isset($request->all()['image']))
			$producto->imagen_url = $this->crearImagen(Input::file('image'));
		$producto->save();
		Session::flash('message', 'Producto actualizado corectamente');
		return Redirect::to($this->formRoute.'/create');
	}
	public function update_estado($codigo)
	{

		$estado = Producto::find($codigo);
		$estado->estado=$estado->estado?0:1;
		$estado->save();
		Session::flash('message','Estado actualizado exitosamente');
		return Redirect::to($this->formRoute.'/create');


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
