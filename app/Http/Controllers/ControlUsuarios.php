<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Usuario;
use Session;
use Redirect;

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

}
