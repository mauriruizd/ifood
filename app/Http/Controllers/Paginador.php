<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Redirect;
use URL;
use Input;
use App\Producto;
use App\Usuario;
use App\Categoria;
use App\Empresa;
use App\Pedido;
use App\DireccionCliente;

class Paginador extends Controller {

	public function index(){
		return view('food.hello');
	}


	//	PRUEBA DE PAGINACION CON LARAVEL

	public function DosCategorias($n=10){
		$categorias = Categoria::paginate($n);
		echo "<pre>";
		print_r(json_decode($categorias->toJson()));
		echo "</pre>";
		return view('categoriasDisponibles', compact('categorias'));
	}

	public function PrimeraVistaUsuario(){
		if(Session::has('hungry_user')){
			$categorias = Categoria::all();
			$empresas = Empresa::where('estado', '=', 'activo')
			->get();
			return view('food.login', compact('categorias', 'empresas'));
		} else {
			return Redirect::action("Paginador@index");
		}
	}

	public function VistaCategoria($categoria){
		$categoria = Categoria::where('slug', $categoria)
		->select('slug', 'codigo', 'nombre')
		->first();
		if(count($categoria) < 1)
			return view('food.categoria')->with('error', 'Categoria no encontrada.');
		$empresas = Empresa::join('persona_empresas_categoria', 'persona_empresas.codigo', '=', 'persona_empresas_categoria.empresa_codigo')
		->select('persona_empresas.*', 'persona_empresas_categoria.categoria_codigo')
		->where('categoria_codigo', '=', $categoria->codigo)
		->where('estado', '=', 'activo')
		->get();
		if(count($empresas) > 0){
			return view('food.categoria', compact('empresas', 'categoria'));
		} else {
			return view('food.categoria')->with('error', 'No hay empresas registradas en la categoria.');
		}
	}

	public function CategoriasDisponibles(){
		$categorias = Categoria::all();
		return view('food.todasCategorias', compact('categorias'));
	}

	public function FormularioCargarCategoria(){
		return view('food.nuevaCategoria');
	}

	public function CargarCategoria(Request $datosCategoria){
		foreach($datosCategoria as $campo){
			if($campo == '') return view('food.nuevaCategoria');
		}

		//Guardar la imagen
		if($datosCategoria->hasFile('logo_categoria')){
			$archivo = $datosCategoria->file('logo_categoria');
			$nombreArchivo = $archivo->getClientOriginalName();
			$rutaArchivo = 'img/categorias/';
			$archivo->move(public_path().'/'.$rutaArchivo, $nombreArchivo);
		} else {
			return view('food.nuevaCategoria');
		}

		$nCategoria = new Categoria;
		$nCategoria->nombre = $datosCategoria['nombre_categoria'];
		$nCategoria->slug = $datosCategoria['slug_categoria'];
		$nCategoria->imagen_url = $rutaArchivo.$nombreArchivo;
		if($nCategoria->save()){
			return view('uncatched')->with('error', 'Todo en orden Houston.');
		}
		return view('uncatched')->with('error', 'Houston. Tenemos un problema.');
	}

	public function Settings(){
		$campos = Usuario::select('nombres')
		->first(Session::get('hungry_user')->codigo);
		//dd($campos['attributes']);
		$campos = $campos['attributes'];
		return view('settings.index', compact('campos'));
	}

	public function UpdateSettings(Request $datos){
		dd($datos->request);
	}

	public function AddDireccion(Request $datos){
		
		foreach($datos->request as $campo){
			if($campo == ''){
				return Redirect::back();
			}
		}
		$nDireccion = new DireccionCliente;
		$nDireccion->persona_cliente_codigo = Session::get('hungry_user')->codigo;
		$nDireccion->nombre = $datos->nombre_direccion;
		$nDireccion->direccion = $datos->direccion_direccion;
		$nDireccion->longitud = $datos->formLng;
		$nDireccion->latitud = $datos->formLat;
		if($nDireccion->save()){
			return Redirect::back();
		}
	}

	public function FormAddDireccion(){
		return view('food.agregarDireccion');
	}

	public function BusquedaAjax(){
		$input = Input::query('busq');
		if($input == '' || gettype($input) == "NULL"){
			return '';
		}
		$exp = explode(' ', $input);

		$s = '';
		$c = 1;
		foreach ($exp AS $e)
		{
		    $s .= "+$e*";

		    if ($c + 1 == count($exp))
		        $s .= ' ';

		    $c++;
		}

		$query = "MATCH (productos.denominacion) AGAINST ('$s' IN BOOLEAN MODE) LIMIT 5";
		// $query looks like 
		// MATCH (first_name, last_name, email) AGAINST ('+jar* +eitni*' IN BOOLEAN MODE)

		$productos = Producto::join('persona_empresas', 'productos.empresa_codigo', '=', 'persona_empresas.codigo')
		->select('productos.codigo', 'productos.denominacion', 'productos.empresa_codigo', 'productos.imagen_url',
			'persona_empresas.slug', 'persona_empresas.logo_url')
		->whereRaw($query)->get();
		if(count($productos) > 0){
			return view('food.busquedaAjax', compact('productos'));
		} else {
			return '';
		}
	}

	public function param($par){
		return $par;
	}
}