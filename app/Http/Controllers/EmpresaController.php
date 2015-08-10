<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UserUpdaterRequest;
use App\Http\Requests\UserCreateRequest;
use Session;
use Redirect;
use App\User;
use Auth;
use Illuminate\Routing\Route;

class EmpresaController extends Controller {

	public function __construct(){
	$this->middleware('auth');
	//$this->middleware('control');

	}

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

		return view('usuario.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserCreateRequest  $request)
	{
		User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'password'=>$request['password'],

			'persona_empresa_codigo'=>Auth::user()->persona_empresa_codigo,
			'roles'=> $request['activo'],

		]);
		//return 'usuario registrado';
		Session::flash('message','Usuario creado exitosamente');
		return Redirect::to('/control/usuarios');
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

	public function edit($codigo)
	{
		$user =User::find($codigo);
		return view('usuario.edit',['user'=>$user]);

	}


	public function update($codigo, Request $request)
	{
		$user = User::find($codigo);
		$user->fill($request->all());
		$user->save();

		Session::flash('message','Usuario actualizado exitosamente');
		return Redirect::to('/control/usuarios');
	}

	public function destroy($codigo)
	{
		$user = User::find($codigo);
		$user->delete();
		//User::destroy($codigo);
		Session::flash('message', 'Usuario eliminado correctamente');
		return Redirect::to('/control/usuarios');
	}

}
