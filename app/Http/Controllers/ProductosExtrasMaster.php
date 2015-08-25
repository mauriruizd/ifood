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

class ProductosExtrasMaster extends Controller {

	protected $routes;
	protected $categoria;
	protected $formRoute;


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
		$subcategoriasSelect = $this->getSubcategorias();
		$prodExtras = ProductoExtra::where('empresa_codigo', '=', $this->empresa())->paginate(4);
		return view('admin.Extras', ['routes'=>$this->routes, 'formRoute'=>$this->formRoute, 'subcategoriasSelect'=>$subcategoriasSelect, 'prodExtras'=>$prodExtras]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		ProductoExtra::create([
			'nombres'=>$request->nombre,
			'empresa_codigo'=>$this->empresa(),
			'estado'=>1,
		]);
		Session::flash('message', 'Extra guardado con exito');
		return Redirect::to($this->formRoute.'/create');
	}

	public function storeSubExtras(Request $request){
		$precios = $request->precios;
		foreach($request->subcategorias as $subcat) {
			foreach ($request->extras as $extra) {
				Extra::create([
					'pextra_codigo' => $extra,
					'subcategoria_codigo' => $subcat,
					'precio_extra' => $precios[$extra]
				]);
			}
		}
		Session::flash('message', 'Extra(s) guardado(s) con exito');
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
		$extra = ProductoExtra::find($codigo);

		return view('usuario.edit_generico',['extra'=>$extra,'routes'=>$this->routes, 'formRoute'=>$this->formRoute]);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $codigo)
	{

		$extra = ProductoExtra ::find($codigo);
		$extra->fill($request->all());
		$extra->save();
		Session::flash('message','Extras actualizado exitosamente' );
		return Redirect::to($this->formRoute.'/create');
	}

	public function update_estado($codigo)
	{
		$extra = ProductoExtra::find($codigo);
		$extra->estado=$extra->estado?0:1;
		$extra->save();
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
		ProductoExtra::destroy($codigo);
		Session::flash('message','Extras eliminado exitosamente' );
		return Redirect::to($this->formRoute.'/create');


	}

	protected function getSubcategorias(){
		$sub = Subcategoria::join('categorias', 'subcategorias.categoria_codigo', '=', 'categorias.codigo')
			->where('categoria_codigo', '=', $this->categoria)
			->where('empresa_codigo', '=', $this->empresa())
			->where('categoria_codigo', '=', $this->categoria)
			->select('subcategorias.*')
			->get();

		$subArray = [];

		foreach($sub as $unaSub){
			$subArray[$unaSub->codigo] = $unaSub->nombres;
		}
		return $subArray;
	}

	protected function empresa(){
		return Auth::user()->persona_empresa_codigo;
	}
}
