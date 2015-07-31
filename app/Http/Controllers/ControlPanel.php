<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControlPanel extends Controller {

	public function index(){
		//$user
		return view('admin.panel');

	}
	public function usuario(){
		return view('admin.usuario');

	}
	public function cadastro(){
		return view('admin.cadastro');

	}
		public function promociones(){
		return view('admin.promociones');

	}
	public function pizza(){
		return view('admin.pizza');
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


}
