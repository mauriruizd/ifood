<?php namespace App\Http\Controllers;

use App\EspecialidadPizza;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Illuminate\Http\Request;

class ControlPanel extends Controller {
	public function __construct(){
		$this->middleware('auth',['only'=>'control']);
	}

	public function control(){

		return view('admin.panel');
	}
	public function usuario(){
		$users = User::paginate(5);
	return view('usuario.create', compact('users'));

	}
	public function cadastro(){
		return view('admin.cadastro');

	}
	public function pizza(){
		return view('admin.PizzaEspecialidad');

	}
	public function pizzaEspecialidad(){
		return view('admin.PizzaSabor');

	}
	public function promociones(){
		return view('admin.promociones');
	}

	public function lomito(){
		return view('admin.lomito');
	}
	public function hamburguesas(){
		return view('admin.hamburguesas');
	}
	public function bebidas(){
		return view('admin.bebidas');
	}
	public function helado(){
		return view('admin.helado');
	}
	public function oriental(){
		return view('admin.oriental');
	}
	public function vegana(){
		return view('admin.vegana');
	}
	public function login(){
		/*$hash = User::find(6);
		$hash->password=Hash::make('123');
		$hash->save();*/

		return view('admin.login');
	}

}
