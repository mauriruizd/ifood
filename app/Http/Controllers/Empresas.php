<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Input;
use DB;
use Redirect;
use App\Empresa;
use App\CategoriasEmpresa;
use App\Categoria;
use App\Producto;
use App\Favorito;
use App\Pedido;
use App\Slug; //Clase propia. Asegurarse de incluir en otros proyectos si necesario.
use App\ArraySort; //Clase propia. Asegurarse de incluir en otros proyectos si necesario.

use App\Extra;
use App\ConfigPizza;
use App\TamanhoPizza;
use App\MasaPizza;
use App\EspecialidadPizza;
use App\DetallePizza;

class Empresas extends Controller {

	public function VistaEmpresa($empresaParam){
		$empresa = Empresa::where('slug', $empresaParam)
		->where('estado', '=', 1)
		->first();
		if(count($empresa) > 0){
			$productos = Producto::join('categorias', 'productos.categoria_codigo', '=', 'categorias.codigo')
			->select('productos.*', 'categorias.nombre')
			->where('productos.empresa_codigo', $empresa->codigo)
			->orderBy('categoria_codigo', 'desc')
			->get();
			$p = json_decode(json_encode($productos), true);
			$productos = ArraySort::group($p, "nombre");
			return view('empresas.productosEmpresa', compact('empresa', 'productos'));
		}
		return view('uncatched')->with('error', 'Pagina no encontrada.');
	}


	public function VistaProducto($empresa, $id_producto){
		$estaEnCarrito = Session::has('carrito.items.'.$id_producto);
		$extra = Input::has('config') ? Input::query('config') : null;
		$producto = Producto::where('codigo', $id_producto)->first();
		$favorito = Favorito::where('favoritos_producto_codigo', '=', $id_producto)
		->where('favoritos_persona_cliente_codigo', '=', Session::get('hungry_user')->codigo)
		->count();
		$filtrosPizza = ConfigPizza::join('cat_pizza_detalles', 'cat_pizza_detalles.cat_pizza_esp_codigo', '=', 'cat_pizza_config.cat_pizza_esp_codigo')
		->join('cat_pizza_tipo_masa', 'cat_pizza_tipo_masa.codigo', '=', 'cat_pizza_detalles.cat_pizza_masa_codigo')
		->join('cat_pizza_tamanhos', 'cat_pizza_tamanhos.codigo', '=', 'cat_pizza_detalles.cat_pizza_tamanho_codigo')
		->select('cat_pizza_tipo_masa.nombre as masa_nombre', 'cat_pizza_tamanhos.nombre as tamanho_nombre', 'cat_pizza_detalles.precio', 'cat_pizza_detalles.codigo as config_pizza',
			'cat_pizza_tamanhos.cant_sabores', 'cat_pizza_tamanhos.cant_porcion', 'cat_pizza_detalles.cat_pizza_esp_codigo as esp_codigo')
		->where('cat_pizza_config.producto_codigo', '=', $id_producto)
		->get();
		$isPizza = (count($filtrosPizza) != 0);
		$agregados = !$isPizza ? Extra::where('subcategoria_codigo', '=', $producto->subcategoria_codigo)
			->where('empresa_codigo', '=', $producto->empresa_codigo)
			->join('productos_extras', 'productos_extras.codigo', '=', 'producto_sub_extras.pextra_codigo')
			->select('productos_extras.nombres', 'producto_sub_extras.precio_extra', 'producto_sub_extras.codigo')
			->get() : Extra::where('pespecialidad_codigo', '=', $filtrosPizza[0]->esp_codigo)
				->where('empresa_codigo', '=', $producto->empresa_codigo)
				->join('productos_extras', 'productos_extras.codigo', '=', 'producto_sub_extras.pextra_codigo')
				->select('productos_extras.nombres', 'producto_sub_extras.precio_extra', 'producto_sub_extras.codigo')
				->get();
		$sabores_extras = $isPizza ? Producto::join('cat_pizza_config', 'cat_pizza_config.producto_codigo', '=', 'productos.codigo')
			->select('productos.codigo', 'productos.denominacion', 'productos.imagen_url', 'productos.descripcion',
				'productos.categoria_codigo', 'productos.empresa_codigo')
			->where('productos.codigo', '!=', $producto->codigo)
			->get() : null;
		if(count($producto) > 0){
			return view('empresas.vistaProducto', compact('producto', 'empresa', 'favorito', 'filtrosPizza', 'extra', 'agregados', 'sabores_extras', 'estaEnCarrito'));
		} else {
			return view('empresas.vistaProducto')->with('error', 'Producto no encontrado.');
		}
	}

	public function PanelEmpresa($empresaParam){
		$empresa = Empresa::where('slug', $empresaParam)->where('estado', '=', 1)->first();
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
		$nEmpresa->denominacion = $datos['nombre_empresa_register'];
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
		$empresas = Empresa::where('estado', 1)->get();
		return view('empresas.todas', compact('empresas'));
	}

	/*	DEV	*/

	public function helloPanel($slug){
		/*$categorias = CategoriasEmpresa::join('persona_empresas', 'persona_empresas.codigo', '=', 'persona_empresas_categoria.empresa_codigo')
		->join('categorias', 'persona_empresas_categoria.categoria_codigo', '=', 'categorias.codigo')
		->where('persona_empresas.slug', '=', $slug)
		->select('categorias.nombre')
		->get();*/
		$empresa = Empresa::where('slug', '=', $slug)
		->select('denominacion', 'codigo')
		->first();
		$empresa->socket_server_token = sha1(uniqid($empresa->codigo, true));
		if(!$empresa->save()){
			return view('uncatched')->with('error', 'Error al crear sesión. Reinicie la página, por favor.');
		}
		return view('empresas.socket', compact('empresa'));
	}

	public function pizzaPanel($slug){
		$configuraciones = ConfigPizza::all();
		$tamanhos = TamanhoPizza::all();
		$masas = MasaPizza::all();
		$especialidades = EspecialidadPizza::join('persona_empresas', 'persona_empresas.codigo', '=', 'cat_pizza_especialidades.empresa_codigo')
		->select('cat_pizza_especialidades.*')
		->where('persona_empresas.slug', '=', $slug)
		->get();
		$retorno = array('configuraciones', 'tamanhos', 'masas', 'especialidades');
		if(!count($especialidades) == 0){
			$detalles = DetallePizza::join('cat_pizza_especialidades', 'cat_pizza_especialidades.codigo', '=', 'cat_pizza_detalles.cat_pizza_esp_codigo')
			->where('cat_pizza_especialidades.empresa_codigo', '=', $especialidades[0]->empresa_codigo)
			->get();
		}
		$retorno[] = 'detalles';
		return view('empresas.addpizza', compact($retorno));
	}

	public function AddTam(){
		$datos = Input::all();
		$nTamanho = new TamanhoPizza;
		$nTamanho->nombre = $datos["nombre"];
  		$nTamanho->cant_porcion = $datos["cant_porcion"];
  		$nTamanho->cant_sabores = $datos["cant_sabores"];
  		if($nTamanho->save())
  			return Redirect::back();
  		return "Fallo!";
	}

	public function AddMasa(){
		$datos = Input::all();
		$nMasa = new MasaPizza;
		$nMasa->nombre = $datos['nombre'];
		if($nMasa->save())
			return Redirect::back();
		return "Fallo!";
	}

	public function AddEsp($slug){
		$empresa = Empresa::where('slug', '=', $slug)
		->select('persona_empresas.codigo')
		->first();
		$datos = Input::all();
		$nEsp = new EspecialidadPizza;
		$nEsp->nombre = $datos['nombre'];
		$nEsp->empresa_codigo = $empresa->codigo;
		if ($nEsp->save())
			return Redirect::back();
		return "Fallo!";
	}

	public function AddDetalle(){
		$datos = Input::all();
		$nDetalle = new DetallePizza;
		$nDetalle->cat_pizza_esp_codigo = $datos['cat_pizza_esp_codigo'];
		$nDetalle->cat_pizza_masa_codigo = $datos['cat_pizza_masa_codigo'];
		$nDetalle->cat_pizza_tamanho_codigo = $datos['cat_pizza_tamanho_codigo'];
		$nDetalle->precio = $datos['precio'];
		if ($nDetalle->save())
			return Redirect::back();
		return "Fallo!";

	}

	/*	FIN DEV	*/
}
