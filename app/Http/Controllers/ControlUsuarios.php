<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Usuario;
use Session;
use Redirect;
use Socialize;
use Input;

class ControlUsuarios extends Controller {

	public function controlRegister(Request $request){
		$datosRegistro = $request->all();
		foreach($datosRegistro as $campo){
			if ($campo == ''){
				return view('uncatched')->with('error', 'Debe llenar todos los campos!');
			}
		}
		$nUsuario = new Usuario;
		$nUsuario->login = $datosRegistro['register_user'];
		$nUsuario->nombres = $datosRegistro['register_name'];
		$nUsuario->apellidos = $datosRegistro['register_apellidos'];
		$nUsuario->email = $datosRegistro['register_mail'];
		$nUsuario->clave = sha1($datosRegistro['register_password']);
		$nUsuario->save();
	}

	public function ControlLogin(Request $request){
		$datosLogin = $request->all();
		$usuario = Usuario::where('login', $datosLogin['login_user'])
			->where('clave', sha1($datosLogin['login_password']))
			->select('codigo', 'nombres', 'apellidos', 'email', 'celular')
			->select('codigo', 'nombres')
			->first();
		if(count($usuario) > 0){
			if(!Session::has('carrito')){
				$newCarrito = array('items'=>array(), 'delivery'=>0, 'direccion'=>'');
				Session::put('carrito', $newCarrito);
			}
			Session::put('hungry_user', $usuario);
			return Redirect::action("Paginador@PrimeraVistaUsuario");
		}
		return view('uncatched')->with('error', 'Usuario no encontrado.');
	}

	public function FacebookRedirect(){
		return Socialize::with('facebook')->redirect();
	}

	public function FacebookLogin(){
		$socialUser = Socialize::with('facebook')->user();
		$user = Usuario::where('email', '=', $socialUser->email)
			->select('codigo', 'nombres', 'apellidos', 'email', 'celular')
			->first();
		if(count($user) <= 0){
			$user = new Usuario;
			$user->nombres = $socialUser->user['first_name'];
			$user->apellidos = $socialUser->user['last_name'];
			$user->email = $socialUser->email;
			$user->save();
		}
		if(!Session::has('carrito')){
			$newCarrito = array('items'=>array(), 'delivery'=>0, 'direccion'=>'');
			Session::put('carrito', $newCarrito);
		}
		Session::put('hungry_user', $user);
		return Redirect::to("inicio");
	}

	public function ControlLogout(){
		Session::forget('hungry_user');
		Session::forget('carrito');

		return Redirect::to('/');
	}

	public function UpdateNombres(){
		$datos = Input::all();
		$myUser = Session::get('hungry_user');
		$myUser->nombres = $datos['updated'];
		$myUser->save();
		return Redirect::back();
	}

	public function UpdateApellidos(){
		$datos = Input::all();
		$myUser = Session::get('hungry_user');
		$myUser->apellidos = $datos['updated'];
		$myUser->save();
		return Redirect::back();
	}

	public function UpdatePassword(){
		$datos = Input::all();
		if($datos['password'] != $datos['confirm_password']){
			return Redirect::back()->with('msg', 'Contraseñas desiguales');
		}
		$myUser = Usuario::find(Session::get('hungry_user')->codigo);
		$newPassword = sha1($datos['password']);
		$myUser->clave = $newPassword;
		if($myUser->save()){
			return Redirect::back()->with('msg', 'Contraseña cambiada con exito');
		} else {
			return Redirect::back()->with('msg', 'Error al cambiar contraseña');
		}
	}

}
