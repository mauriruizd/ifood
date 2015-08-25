<?php namespace App\Http\Controllers;

use App\Extra;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductoExtra;
use App\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ControllerExtrasSub extends Controller {

	protected $routes;
	protected $categoria;
	protected $formRoute;
	protected  function empresa(){
		return Auth::user()->persona_empresa_codigo;
	}
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	protected function getSubcategorias(){
		$sub =  Subcategoria::where('categoria_codigo', '=', $this->categoria)
			->where('empresa_codigo', '=', $this->empresa())
			->get();

		$subArray = [];

		foreach($sub as $unaSub){
			$subArray[$unaSub->codigo] = $unaSub->nombre;
		}
		return $subArray;
	}
	protected  function getExtras(){
		$extras = ProductoExtra::where('empresa_codigo','=', $this->empresa())
			->get();
		$extrasSelect = [];
		foreach ($extras as $extra){
			$extrasSelect[$extra->codigo] = $extra->nombres;
		}
		return $extrasSelect;
	}
	public function create()
	{



		$extras = Extra::join('productos_extras','producto_sub_extras.pextra_codigo','=', 'productos_extras.codigo')
			->join('subcategorias', 'subcategorias.codigo','=','producto_sub_extras.subcategoria_codigo')
			->join('categorias', 'categorias.codigo', '=', 'subcategorias.categoria_codigo')
			->select('subcategorias.nombre as especialidad', 'productos_extras.nombres as extras', 'producto_sub_extras.precio_extra as precio', 'producto_sub_extras.codigo')
			->where('categorias.codigo', '=', $this->categoria)
			->Paginate(4);

		$lomito = Subcategoria::where('empresa_codigo', '=', $this->empresa())
			->where('categoria_codigo', '=', $this->categoria)
			->get();

		$selectLomito = array();
		foreach ($lomito as $lomitos) {
			$selectLomito[$lomitos->codigo] = $lomitos->nombre;
		}





		$extraSelet = $this->getExtras();
		$subcategoriasSelect = $this->getSubcategorias();

		return view('admin.ExtrasEspecialidad',['extras'=>$extras,'lomito'=>$lomito,'selectLomito'=>$selectLomito,'extraSelet'=>$extraSelet,'subcategoriasSelect'=>$subcategoriasSelect, 'formRoute'=>$this->formRoute, 'routes'=>$this->routes]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		foreach ($request->extras as $extra){
			Extra::create([
				'subcategoria_codigo'=>$request->especialidad,
				'pespecialidad_codigo'=>21,
				'pextra_codigo'=>$extra,
				'precio_extra'=>$request->precio,
			]);
		}
		Session::flash('message', 'Extras / Especialidad creado exitosamente ');
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
		$extras = Extra::find($codigo);
		$extraSelet = $this->getExtras();
		$subcategoriasSelect = $this->getSubcategorias();

		return view('usuario.edit_ExtrasSub', ['extras'=>$extras,'extraSelet'=>$extraSelet,'subcategoriasSelect'=>$subcategoriasSelect,'formRoute'=>$this->formRoute, 'routes'=>$this->routes]);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $codigo)
	{
		$extra = Extra::find($codigo);
		$extra->fill($request->all());
		$extra->save();
		Session::flash('message','Extras actualizado exitosamente' );
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
		Extra::destroy($codigo);
		Session::flash('message','Extras / Especialidad Eliminado exitosamente');
		return Redirect::to('/ExtrasSubLomitos/create');
	}

}
