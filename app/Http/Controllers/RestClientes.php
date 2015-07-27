<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Input;
use Session;

use App\Usuario;


class RestClientes extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Input::all();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$datos = Input::all();
		$nUsuario = new Usuario;
		$nUsuario->nombres = $datos['nombres'];
		$nUsuario->apellidos = $datos['apellidos'];
		$nUsuario->login = $datos['login'];
		$nUsuario->clave = sha1($datos['clave']);
		$nUsuario->celular = $datos['celular'];
		$nUsuario->email = $datos['email'];
		return (int)$nUsuario->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = Usuario::select('codigo', 'nombres', 'apellidos', 'email', 'celular')
		->find($id);
		return $user;
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
		$datos = Input::all();
		$user = Usuario::find($id);
		isset($datos['nombres']) ? $user->nombres = $datos['nombres'] : false;
		isset($datos['apellidos']) ? $user->apellidos = $datos['apellidos'] : false;
		isset($datos['clave']) ? $user->clave = sha1($datos['clave']) : false;
		return (int)$user->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = Usuario::find($id);
		$user->estado = 0;
		return (int)$user->save();
	}

	public function login(){
		$input = Input::all();
		$usuario = Usuario::where('login', $input['login_user'])
			->where('clave', sha1($input['login_password']))
			->where('estado', '1')
			->select('codigo', 'nombres', 'apellidos', 'email', 'celular')
			->first();
		if(count($usuario) > 0){
			if(!Session::has('carrito')){
				$newCarrito = array('items'=>array(), 'delivery'=>0, 'direccion'=>'');
				Session::put('carrito', $newCarrito);
			}
			Session::put('hungry_user', $usuario);
			return new Response($usuario, 200);
		}
		return new Response(null, 404);
	}

	public function logout(){
		if(!Session::has('hungry_user'))
			return 0;
		Session::forget('hungry_user');
		Session::forget('carrito');
		return 1;
	}

}
