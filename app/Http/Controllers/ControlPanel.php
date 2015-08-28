<?php namespace App\Http\Controllers;

use App\Pedido;
use Auth;

use App\EspecialidadPizza;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Empresa;
use Hash;
use Illuminate\Http\Request;

class ControlPanel extends Controller {
	public function __construct(){
		$this->middleware('auth',['only'=>'control']);
	}

	public function control(){
		$empresa = Empresa::find(Auth::user()->persona_empresa_codigo);

		$pedidos = Pedido::join('persona_clientes','persona_clientes.codigo', '=', 'pedidos.persona_cliente_codigo')
			->join('persona_cliente_direcciones', 'persona_cliente_direcciones.codigo', '=', 'pedidos.direccion_codigo')
			->select('pedidos.*','persona_clientes.nombres', 'persona_clientes.celular', 'persona_cliente_direcciones.direccion', 'persona_cliente_direcciones.longitud',
				'persona_cliente_direcciones.latitud')
			->where('pedidos.empresa_codigo', '=', Auth::user()->persona_empresa_codigo)
			->where('pedidos.estado', '=', 'llegado')
			->orderBy('pedidos.codigo', 'DESC')
			->get();

		foreach($pedidos as $pedido){
			$pedido->detallado = $pedido->detalle;
			foreach ($pedido->detallado as $detalle) {
				$detalle->producto = $detalle->nombreProd;
				$detalle->listaextras = $detalle->extras;
				foreach ($detalle->listaextras as $unExtra) {
					$unExtra->producto = $unExtra->prodSubExtra->prodExtra;
				}

			}

		}
		//dd($pedidos);
		//dd($pedidos[15]->detallado[0]->producto);
		return view('admin.panel', compact('empresa', 'pedidos'));

	}
	public function usuario(){
		$users = User::paginate(5);
	return view('usuario.create', compact('users'));

	}
	public function cadastro(){
		return view('admin.cadastro');

	}

	public function login(){
		/*$hash = User::find(6);
		$hash->password=Hash::make('123');
		$hash->save();*/

		return view('admin.login');
	}

}
