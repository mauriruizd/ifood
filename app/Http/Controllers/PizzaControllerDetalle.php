<?php namespace App\Http\Controllers;

use App\TamanhoPizza;
use App\EspecialidadPizza;
use App\MasaPizza;
use App\DetallePizza;
use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class PizzaControllerDetalle extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$detaPizza = DetallePizza::join('cat_pizza_especialidades', 'cat_pizza_especialidades.codigo', '=', 'cat_pizza_detalles.cat_pizza_esp_codigo')
			->join('cat_pizza_tipo_masa', 'cat_pizza_tipo_masa.codigo', '=', 'cat_pizza_detalles.cat_pizza_masa_codigo')
			->join('cat_pizza_tamanhos', 'cat_pizza_tamanhos.codigo', '=', 'cat_pizza_detalles.cat_pizza_tamanho_codigo')
			->select('cat_pizza_tipo_masa.nombre as masa_nombre', 'cat_pizza_tamanhos.nombre as tamanho_nombre', 'cat_pizza_detalles.precio', 'cat_pizza_detalles.codigo as config_pizza',
				'cat_pizza_tamanhos.cant_sabores', 'cat_pizza_tamanhos.cant_porcion', 'cat_pizza_detalles.cat_pizza_esp_codigo as esp_codigo','cat_pizza_especialidades.nombre as especialidad_nombre',
				'cat_pizza_especialidades.empresa_codigo','cat_pizza_detalles.estado','cat_pizza_detalles.codigo')
			->where('cat_pizza_especialidades.empresa_codigo', '=', Auth::user()->persona_empresa_codigo)

			->get();



			$selector = $this->crearSelect();
			$selectEspecie=$selector['selectEspecie'];
			$selectMasa =$selector['selectMasa'];
			$selectTamanho=$selector['selectTamanho'];

		return view('admin.PizzaDetalle', compact('detaPizza','pizzaEspecie','selectEspecie','pizzaTamanho','selectTamanho','pizzaMasa','selectMasa'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		DetallePizza::create([
			'cat_pizza_esp_codigo'=>$request['especialidad'],
			'cat_pizza_tamanho_codigo'=>$request['tamanho'],
			'cat_pizza_masa_codigo'=>$request['masa'],
			'precio'=>$request['precio'],
			'estado'=>1,

		]);

		Session::flash('message','Especialidad creado exitosamente');
		return Redirect::to('/PizzaControlDetalle/create');

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
		$selector = $this->crearSelect();
		$selectEspecie=$selector['selectEspecie'];
		$selectMasa =$selector['selectMasa'];
		$selectTamanho=$selector['selectTamanho'];

		$detaPizza = DetallePizza::find($codigo);
		return view('usuario.edit_detalle',['detaPizza'=>$detaPizza, 'selectEspecie'=>$selectEspecie, 'selectMasa'=>$selectMasa,'selectTamanho'=>$selectTamanho]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($codigo)

	{

	}
	public function update_estado($codigo)
	{
		$estado = DetallePizza::find($codigo);
		$estado->estado=$estado->estado?0:1;
		$estado->save();
		Session::flash('message','Estado actualizado exitosamente');
		return Redirect::to('/PizzaControlDetalle/create');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($codigo)
	{
		DetallePizza::destroy($codigo);
		Session::flash('message','Detaller eliminado correctamente');
		return Redirect::to('/PizzaControlDetalle/create');
	}

}
