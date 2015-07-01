<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Empresa;
use App\CategoriasEmpresa;
use App\Categoria;
use App\Producto;
use App\Pedido;
use App\Slug; //Clase propia. Asegurarse de incluir en otros proyectos si necesario.
use App\ArraySort; //Clase propia. Asegurarse de incluir en otros proyectos si necesario.

class Empresas extends Controller {

	public function VistaEmpresa($empresaParam){
		$empresa = Empresa::where('slug', $empresaParam)
		->where('estado', '=', 'activo')
		->first();
		if(count($empresa) > 0){
			$productos = Producto::join('categorias', 'productos.categoria_codigo', '=', 'categorias.codigo')
			->select('productos.*', 'categorias.nombre')
			->where('productos.empresa_codigo', $empresa->codigo)
			->orderBy('categoria_codigo', 'desc')
			->get();
			//dd($productos);
			$p = json_decode(json_encode($productos), true);
			$productos = ArraySort::group($p, "nombre");
			return view('empresas.productosEmpresa', compact('empresa', 'productos'));
		}
		return view('uncatched')->with('error', 'Pagina no encontrada.');
	}

	public function VistaProducto($empresa, $id_producto){
		$producto = Producto::where('codigo', $id_producto)->first();
		if(count($producto) > 0){
			return view('empresas.vistaProducto', compact('producto', 'empresa'));
		} else {
			return view('empresas.vistaProducto')->with('error', 'Producto no encontrado.');
		}
	}

	public function PanelEmpresa($empresaParam){
		$empresa = Empresa::where('slug', $empresaParam)->first();
		$pedidos = Pedido::join('usuarios_fast_food', 'usuarios_fast_food.id', '=', 'pedidos_fast_food.id_usuario')
		->where('pedidos_fast_food.id_empresa', '=', $empresa->id)
		->select('pedidos_fast_food.*', 'usuarios_fast_food.nickname', 'usuarios_fast_food.direccion', 
			'usuarios_fast_food.direccion_lng', 'usuarios_fast_food.direccion_lat')
		->get();
		if(count($empresa) > 0){
			return view('empresas.panelEmpresa', compact('empresa'));
		} else {
			return "Pagina no encontrada.";
		}
	}

	public function FormularioRegistroEmpresa(){
		$categorias = Categoria::all();
		return view('empresas.registrar_empresa', compact('categorias'));
	}

	public function RegistroEmpresa(Request $request){
		$datos = $request->all();
		$categorias = json_decode($datos['categorias']);

		$nEmpresa = new Empresa;
		$nEmpresa->nombre = $datos['nombre_empresa_register'];
		$nEmpresa->telefono = $datos['telefono_empresa_register'];
		$nEmpresa->direccion = $datos['direccion_empresa_register'];
		$nEmpresa->longitud = $datos['formLng'];
		$nEmpresa->latitud = $datos['formLat'];
		$nEmpresa->email = $datos['email_empresa_register'];
		$nEmpresa->costo_delivery = $datos['precio_empresa_register'];
		$nEmpresa->radio_cobertura = $datos['radio_delivery'];
		$nEmpresa->slug = Slug::slugify($datos['nombre_empresa_register']);
		if($nEmpresa->save()){
			$nCategorias = array();
			foreach($categorias as $categoria){
				$nCategorias[] = array('empresa_codigo' => $nEmpresa->id, 'categoria_codigo' => $categoria);
			}
			if(DB::table('persona_empresas_categoria')->insert($nCategorias)){
				return view('uncatched')->with('error', 'Bienvenido!');
			} else {
				return view('uncatched')->with('error', 'Hubo un error insertando las categorias!');
			}
		}
		return view('uncatched')->with('error', 'Hubo un error registrando la empresa!');
	}

	public function EmpresasDisponibles(){
		$empresas = Empresa::where('estado', 'activo')
		->get();
		return view('empresas.todas', compact('empresas'));
	}
}
