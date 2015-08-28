<?php namespace App\Http\Controllers;

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
		$prodExtras = ProductoExtra::where('empresa_codigo', '=', $this->empresa())->get();
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
			'empresa_codigo'=>$this->empresa()
		]);
		Session::flash('message', 'Extra guardado con exito');
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

	protected function getSubcategorias(){
		$sub =  Subcategoria::where('categoria_codigo', '=', $this->categoria)
			->where('empresa_codigo', '=', $this->empresa())
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
