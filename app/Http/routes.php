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
//Route::get("bienvenido", "Paginador@HolaEmpresa");
Route::post("login", "ControlUsuarios@ControlLogin");
Route::get("login", "Paginador@PrimeraVistaUsuario");
Route::get("logout", function(){
	if(Session::has('hungry_user')){
		Session::forget('hungry_user');
		Session::forget('carrito');
	}
	return Redirect::action('Paginador@index');
});

Route::get("settings", "Paginador@Settings");
Route::post("settings", "Paginador@UpdateSettings");
Route::get("settings/add/direccion", "Paginador@FormAddDireccion");
Route::post("settings/add/direccion", "Paginador@AddDireccion");

Route::post("register", "ControlUsuarios@ControlRegister");
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
Route::get("empresas/{empresa}/cpanel", "Empresas@PanelEmpresa");

Route::get("carrito", "Carrito@VistaCarrito");
Route::get("carrito/pasodos", "Carrito@PasoDos");
Route::get("carrito/pasotres", "Carrito@PasoTres"); //Resumen Pedido
Route::get("carrito/commit", "Carrito@Commit");
Route::get("carrito/add/{id_producto}", "Carrito@AddProducto");
Route::get("carrito/add/{id_producto}/{qtd}", "Carrito@AddProducto");
Route::get("carrito/remove/{id_producto}", "Carrito@RemoveProducto");
Route::get("seleccionarDireccion/{id}", "Carrito@SeleccionarDireccion");

/*-----------REST-------------*/

Route::resource("v1/api/empresas", "RestEmpresas");
Route::resource("v1/api/categorias", "RestCategorias");

/*----------FIN REST----------*/

Route::get("busquedaAjax", "Paginador@BusquedaAjax");

Route::get("session", function(){
	dd(Session::all());
});

Route::get("delivery", "Carrito@UpdateDelivery");

Route::get("dos-categorias/{n}", "Paginador@DosCategorias");


Route::get("param/{par}", "Paginador@param");