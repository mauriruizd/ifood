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

	protected $categoria;

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
		$subcategoria = Subcategoria::where('empresa_codigo','=',Auth::user()->persona_empresa_codigo)
			->where('categoria_codigo', '=',$this->categoria)->paginate(4);


		return view('admin.Especialidad',compact('subcategoria'));
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
			'categoria_codigo'=>2,
			'estado'=>1,
			'empresa_codigo'=>Auth::user()->persona_empresa_codigo,

		]);
		Session::flash('message','Especialidad creado exitosamente');
		return Redirect::to('/EspecialidadControlLomito/create');
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
	public function destroy($codigo)
	{
		Subcategoria::destroy($codigo);
		Session::flash('message','Especialidad eliminada correctamente');
		return Redirect::to('/EspecialidadControlLomito/create');

	}

}
