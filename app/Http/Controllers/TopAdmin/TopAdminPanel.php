<?php namespace App\Http\Controllers\TopAdmin;

use App\Categoria;
use App\CategoriasEmpresa;
use App\Empresa;
use App\Pedido;
use App\Producto;
use App\Usuario;
use Auth;

use App\Http\Requests;
use Hash;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TopAdminPanel extends Controller
{
	public function __construct(){
//		$this->middleware('auth',['only'=>'control']);
	}
	public function login(){
		return view('topadmin.login');
	}

	public function doLogin(LoginRequest $request)
	{

		$datosLogin = $request->all();
		$usuario = Usuario::where('email', $datosLogin['email'])
			->where('password', sha1($datosLogin['password']))
			->first();

		if(count($usuario) > 0){
			Session::put('topadmin_user', $usuario);
			return Redirect::route("topadmin.dashboard");
		}

		return view('uncatched')->with('error', 'Usuario no encontrado.');

	}

	public function dashboard()
	{

		if(!Session::get('topadmin_user'))
		{
			return Redirect::route("topadmin.login");
		}
	}

	public function logout(){
//		Session::forget('topadmin_user');
//
//		return Redirect::route('topadmin.login');

		$totalPedidos = Pedido::all()->count();
		$totalEmpresas = Empresa::all()->count();
		$totalCategoriasProductos = Categoria::all()->count();
		$totalCategoriasEmpresas = CategoriasEmpresa::all()->count();
		$totalUsuarios = Usuario::all()->count();
		$totalProductos = Producto::all()->count();


		return view('topadmin.panel', compact('totalPedidos', 'totalEmpresas', 'totalCategoriasProductos', 'totalCategoriasEmpresas', 'totalUsuarios', 'totalProductos'));
	}

}
