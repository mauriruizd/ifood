<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/

Route::get("/", "Paginador@index");
Route::post("login", "ControlUsuarios@ControlLogin");
Route::post("register", "ControlUsuarios@ControlRegister");
Route::get("logout", "ControlUsuarios@ControlLogout");


Route::group(['middleware' => 'LoginChecker'], function(){
	Route::get("login", "Paginador@PrimeraVistaUsuario");

	Route::get("settings", function(){
		return Redirect::to('settings/generales');
	});
	Route::get("settings/generales", "Paginador@SettingsGenerales");
	Route::get("settings/pedidos", "Paginador@SettingsPedidos");
	Route::get("settings/direcciones", "Paginador@SettingsDirecciones");
	Route::get("settings/favoritos", "Paginador@SettingsFavoritos");

	Route::get("settings/add/direccion", "Paginador@FormAddDireccion");
	Route::post("settings/add/direccion", "Paginador@AddDireccion");
	Route::post("settings/add/favorito", "Paginador@AddFavorito");

	Route::post("settings/update/direccion/", "Paginador@UpdateDireccion");
	Route::post("settings/update/nombres/", "ControlUsuarios@UpdateNombres");
	Route::post("settings/update/apellidos/", "ControlUsuarios@UpdateApellidos");
	Route::post("settings/update/password/", "ControlUsuarios@UpdatePassword");

	Route::post("settings/delete/direccion/", "Paginador@DeleteDireccion");
	Route::get("settings/delete/favorito/{id}", "Paginador@DeleteFavorito");

	Route::get("carrito", "Carrito@VistaCarrito");
	Route::get("carrito/pasodos",'Carrito@PasoDos');
	Route::get("carrito/pasotres", ['middleware' => 'CarritoChecker', 'uses' => 'Carrito@PasoTres']); //Resumen Pedido
	Route::get("carrito/commit", ['middleware' => 'CarritoChecker', 'uses' => 'Carrito@Commit']);
	Route::get("carrito/add/{id_producto}", "Carrito@AddProducto");
	Route::get("carrito/add/{id_producto}/{qtd}", "Carrito@AddProducto");
	Route::get("carrito/add/{id_producto}/{qtd}/{config}", "Carrito@AddProductoConfig");
	Route::get("carrito/update/{id_producto}/{qtd}", "Carrito@UpdateProducto");
	Route::get("carrito/remove/{id_producto}", "Carrito@RemoveProducto");
	Route::get("seleccionarDireccion/{id}", "Carrito@SeleccionarDireccion");

	Route::get("favoritos", "Paginador@Favoritos");
});


Route::get("categorias", "Paginador@CategoriasDisponibles");
Route::get("categorias/{categoria}", "Paginador@VistaCategoria");
Route::get("nueva-categoria", "Paginador@FormularioCargarCategoria");
Route::post("nueva-categoria", "Paginador@CargarCategoria");

Route::get("registrar-mi-empresa", "Empresas@FormularioRegistroEmpresa");
//Envio de parametros para registro de empresa
Route::post("registrar-mi-empresa", "Empresas@RegistroEmpresa");

Route::get("empresas", "Empresas@EmpresasDisponibles");
Route::get("empresas/{empresa}", "Empresas@VistaEmpresa");
Route::get("empresas/{empresa}/productos/{id_producto}", "Empresas@VistaProducto");
Route::get("empresas/{empresa}/productos/", function($empresa){
	return Redirect::to("empresas/$empresa");
});
Route::get("empresas/{empresa}/cpanel", "Empresas@helloPanel");
Route::get("empresas/{empresa}/cpanel/pizza", "Empresas@pizzaPanel");

Route::post('empresas/{empresa}/cpanel/addtamanho', 'Empresas@AddTam');
Route::post('empresas/{empresa}/cpanel/addmasa', 'Empresas@AddMasa');
Route::post('empresas/{empresa}/cpanel/addespecialidad', 'Empresas@AddEsp');
Route::post('empresas/{empresa}/cpanel/adddetalle', 'Empresas@AddDetalle');



/*-----------REST-------------*/
	Route::resource("v1/api/empresas", "RestEmpresas", ['only' => ['index', 'show']]);
	Route::resource("v1/api/categorias", "RestCategorias", ["only" => ['index', 'show']]);
	Route::resource("v1/api/clientes", "RestClientes", ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
	Route::post("v1/api/clientes/login", "RestClientes@login");

	Route::resource("v1/api/direcciones", "RestDirecciones", ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
	Route::resource("v1/api/productos", "RestProductos", ["only" => ['index', 'show']]);
	Route::resource("v1/api/favoritos", "RestFavoritos", ["only" => ['index', 'show', 'store', 'destroy']]);

	Route::get("session", function(){
		dd(Session::all());
		//dd(Session::all());
	});

/*----------FIN REST----------*/

/*-----------SOCIALITE-------------*/
Route::get("facebook/login", "ControlUsuarios@FacebookLogin");
Route::get("facebook", "ControlUsuarios@FacebookRedirect");
/*----------FIN SOCIALITE----------*/

Route::get("busquedaAjax", "Paginador@BusquedaAjax");

Route::get("delivery", "Carrito@UpdateDelivery");

Route::get("dos-categorias/{n}", "Paginador@DosCategorias");


Route::get("param/{par}", "Paginador@param");

