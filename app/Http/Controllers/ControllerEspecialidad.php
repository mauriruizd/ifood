<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Subcategoria;
use App\User;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class ControllerEspecialidad extends Controller {


	protected $routes;
	protected $categoria;
	protected $formRoute;
	protected  function empresa(){
		return Auth::user()->persona_empresa_codigo;
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
		$subcategoria = Subcategoria::where('empresa_codigo','=',$this->empresa())
			->where('categoria_codigo', '=',$this->categoria)->paginate(4);


		return view('admin.Especialidad',['subcategoria'=>$subcategoria, 'routes'=>$this->routes, 'formRoute'=>$this->formRoute]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{

		Subcategoria::create([
			'nombre'=>$request['nombre'],
			'categoria_codigo'=>$this->categoria,
			'estado'=>1,
			'empresa_codigo'=>$this->empresa(),

		]);
		Session::flash('message','Especialidad creado exitosamente');
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
		$especialidad = Subcategoria::find($codigo);
		return view('usuario.edit_especialidad_generico', ['routes'=>$this->routes, 'formRoute'=>$this->formRoute, 'especialidad'=>$especialidad]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $codigo)
	{
		$especialidad = Subcategoria::find($codigo);
		$especialidad->fill($request->all());
		$especialidad->save();
		Session::flash('message', 'Especialidad actualizada correctamente');
		return Redirect::to($this->formRoute.'/create');
	}
	public function update_estado($codigo)
	{

		$especialidad = Subcategoria::find($codigo);
		$especialidad->estado=$especialidad->estado?0:1;
		$especialidad->save();
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
		Subcategoria::destroy($codigo);
		Session::flash('message','Especialidad eliminada correctamente');
		return Redirect::to($this->formRoute.'/create');

	}

}
