<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ProductoExtra;
use App\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
			$extrasSelect[$extra->codigo] = $extra->nombre;
		}
		return $extrasSelect;
	}
	public function create()
	{




		$lomito = Subcategoria::where('empresa_codigo', '=', Auth::user()->persona_empresa_codigo)
			->where('categoria_codigo', '=', 2)
			->get();

		$selectLomito = array();
		foreach ($lomito as $lomitos) {
			$selectLomito[$lomitos->codigo] = $lomitos->nombre;
		}





		$extraSelet = $this->getExtras();
		$subcategoriasSelect = $this->getSubcategorias();

		return view('admin.ExtrasSub',['lomito'=>$lomito,'selectLomito'=>$selectLomito,'extraSelet'=>$extraSelet,'subcategoriasSelect'=>$subcategoriasSelect, 'formRoute'=>$this->formRoute, 'routes'=>$this->routes]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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

}
