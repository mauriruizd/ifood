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
Route::get("nueva_clave", "ControlUsuarios@ResetPasswordForm");
Route::post("nueva_clave/", "ControlUsuarios@ResetPassword");
Route::get("salir", "ControlUsuarios@ControlLogout");


Route::group(['middleware' => 'LoginChecker'], function(){
	Route::get("inicio", "Paginador@PrimeraVistaUsuario");

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
	Route::post("carrito/add", "Carrito@Add");
	Route::get("carrito/add/{id_producto}", "Carrito@AddProducto");
	Route::get("carrito/add/{id_producto}/{qtd}", "Carrito@AddProducto");
	Route::get("carrito/add/{id_producto}/{qtd}/{config}", "Carrito@AddProductoConfig");
	Route::get("carrito/update/{id_producto}/{qtd}", "Carrito@UpdateProducto");
	Route::get("carrito/remove/{id_producto}", "Carrito@RemoveProducto");
	Route::post("carrito/seleccionarDireccion", "Carrito@SeleccionarDireccion");

	Route::get("favoritos", "Paginador@Favoritos");
	Route::get("busquedaAjax", "Paginador@BusquedaAjax");
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
	Route::post("v1/api/clientes/login", "RestClientes@login");
	Route::post("v1/api/clientes/logout", "RestClientes@logout");

	Route::resource("v1/api/empresas", "RestEmpresas", ['only' => ['index', 'show']]);
	Route::get('v1/api/empresas/{id}/productos', "RestEmpresas@productos");
	Route::get('v1/api/empresas/{id}/categorias', "RestEmpresas@categorias");
	Route::get('v1/api/empresas/{id}/subcategorias', "RestEmpresas@subcategorias");
	Route::get('v1/api/empresas/{id}/subcategorias/{id_subcat}', "RestEmpresas@subcategorias");
	Route::get('v1/api/empresas/{id}/subcategorias/{id_subcat}/productos', "RestEmpresas@productos_subcategorias");
	Route::get('v1/api/empresas/{id}/extras', "RestEmpresas@extras");
	Route::get('v1/api/empresas/{id}/pizza/especialidades', "RestEmpresas@especialidades_pizza");
	Route::get('v1/api/empresas/{id}/pizza/configuraciones', "RestEmpresas@configuraciones_pizza");
	Route::resource("v1/api/categorias", "RestCategorias", ["only" => ['index', 'show']]);
	Route::resource("v1/api/subcategorias", "RestSubcategorias", ["only" => ['index', 'show']]);
	Route::get("v1/api/subcategorias/{id}/extras", "RestSubcategorias@extras");
	Route::get("v1/api/subcategorias/{id}/productos-extras", "RestSubcategorias@productos_extras");
	Route::resource("v1/api/clientes", "RestClientes", ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
	Route::resource("v1/api/ranking", "RestRanking");
	Route::resource("v1/api/puntuaciones", "RestPuntuacion");

	Route::resource("v1/api/direcciones", "RestDirecciones", ['only' => ['index', 'show', 'store', 'update', 'destroy']]);
	Route::resource("v1/api/productos", "RestProductos", ["only" => ['index', 'show']]);
	Route::get("v1/api/productos/{id}/extras", "RestProductos@extras");
	Route::resource("v1/api/favoritos", "RestFavoritos", ["only" => ['index', 'show', 'store', 'destroy']]);
	Route::resource("v1/api/ciudades", "RestCiudades", ["only" => ['index']]);
	Route::resource("v1/api/pedidos", "RestPedidos");

	Route::get("session", function(){
		dd(Session::all());
	});

/*----------FIN REST----------*/

/*-----------SOCIALITE-------------*/
Route::get("facebook/login", "ControlUsuarios@FacebookLogin");
Route::get("facebook", "ControlUsuarios@FacebookRedirect");

Route::get("google/login", "ControlUsuarios@GoogleLogin");
Route::get("google", "ControlUsuarios@GoogleRedirect");
/*----------FIN SOCIALITE----------*/



/*------ADMINISTRACION PARA LAS EMPRESAS-------*/
Route::get("control", "ControlPanel@control");
Route::get("login","ControlPanel@login");




Route::get("control/usuarios","ControlPanel@usuario");
Route::get("control/cadastro","ControlPanel@cadastro");

Route::get("control/cadastro/lomito","ControlPanel@lomito");
Route::get("control/cadastro/hamburguesas","ControlPanel@hamburguesas");
Route::get("control/cadastro/bebidas","ControlPanel@bebidas");
Route::get("control/cadastro/helado","ControlPanel@helado");
Route::get("control/cadastro/oriental","ControlPanel@oriental");
Route::get("control/cadastro/vegana","ControlPanel@vegana");
Route::get("control/promociones","ControlPanel@promociones");

Route::get("control/cadastro/pizza","ControlPanel@pizza");
Route::get("control/cadastro/pizzaEspecialidad","ControlPanel@pizzaEspecialidad");



Route::resource('usuario', 'EmpresaController');
Route::resource('pizza', 'PizzaController');

Route::post('pizza/create/tamanho', ['as'=>'pizza.TamanhoEspecialidad','uses'=>'PizzaController@TamanhoEspecialidad']);
Route::delete('pizza/create/delete/{deleteEspecialidad}', ['as'=>'pizza.deleteEspecialidad','uses'=>'PizzaController@deleteEspecialidad']);
Route::get('pizza/create/editar/{edit_tamanho}', ['as'=>'pizza.edit_tamanho','uses'=>'PizzaController@edit_tamanho']);
Route::PUT('pizza/create/editar/{update_tamanho}', ['as'=>'pizza.update_tamanho','uses'=>'PizzaController@update_tamanho']);

Route::get('pizza/create/estadotamanho/{update_estado}', ['as'=>'pizza.update_estado','uses'=>'PizzaController@update_estado']);

Route::post('pizza/create/masa',['as'=>'pizza.MasaPizzaCreate', 'uses'=>'PizzaController@MasaPizzaCreate']);
Route::delete('pizza/create/delete_masa/{deleteMasa}',['as'=>'pizza.deleteMasa', 'uses'=>'PizzaController@deleteMasa']);

Route::resource('log','LogController');
Route::get('logout', 'LogController@logout');
//Route::POST('controls', ['as'=>'controls','uses'=>'LogController@LoginControl']);
Route::resource('PizzaControl','PizzaControllerSabor');
Route::resource('PizzaControlTamanho','PizzaControllerTamanho');
Route::resource('PizzaControlMasa','PizzaControllerMasa');
Route::resource('PizzaControlDetalle','PizzaControllerDetalle');
Route::resource('PizzaControlProducto','PizzaControllerProducto');
Route::resource('ControlExtras','ControllerExtras');//aca estan todos los extras

Route::resource('EspecialidadControl','ControllerEspecialidad');



Route::get('PizzaControlTamanho/create/estadotamanho/{update_estado}', ['as'=>'PizzaControlTamanho.update_estado','uses'=>'PizzaControllerTamanho@update_estado']);
Route::get('PizzaControlDetalle/create/estadodetalle/{update_estado}', ['as'=>'PizzaControlTamanho.update_estado','uses'=>'PizzaControllerDetalle@update_estado']);
Route::get('PizzaControlProducto/create/estadoProduc/{update_estado}', ['as'=>'PizzaControlTamanho.update_estado','uses'=>'PizzaControllerProducto@update_estado']);

//lomitos
Route::resource('ControlProductoLomito','ControllerProductoLomito');
Route::resource('EspecialidadControlLomito','ControllerEspecialidadLomito');
Route::resource('ExtrasLomitos', 'ControllerLomitoExtras');
Route::resource('ExtrasSubLomitos','ControllerExtrasSubLomito');
Route::get('ControlProductoLomito/create/estadoProduc/{update_estado}', ['as'=>'LomitoControl.update_estado','uses'=>'ControllerProductoLomito@update_estado']);
Route::get('ExtrasLomitos/create/estadoProduc/{update_estado}', ['as'=>'ExtrasLomitos.update_estado','uses'=>'ControllerLomitoExtras@update_estado']);
Route::get('EspecialidadControlLomito/create/estadoProduc/{update_estado}', ['as'=>'EspecialidadControlLomito.update_estado','uses'=>'ControllerEspecialidadLomito@update_estado']);

//hamburguesas
Route::resource('ControlProductoHamburguesa','ControllerProductoHamburguesa');
Route::resource('EspecialidadControlHamburguesa','ControllerEspecialidadHamburguesa');
Route::resource('ExtrasHamburguesa', 'ControllerHamburguesaExtras');
Route::resource('ExtrasSubHamburguesa','ControllerExtrasSubHamburguesa');
Route::get('ControlProductoHamburguesa/create/estadoProduc/{update_estado}', ['as'=>'ControlProductoHamburguesa.update_estado','uses'=>'ControllerProductoHamburguesa@update_estado']);
Route::get('ExtrasHamburguesa/create/estadoProduc/{update_estado}', ['as'=>'ExtrasHamburguesa.update_estado','uses'=>'ControllerHamburguesaExtras@update_estado']);
Route::get('EspecialidadControlHamburguesa/create/estadoProduc/{update_estado}', ['as'=>'EspecialidadControlHamburguesa.update_estado','uses'=>'ControllerEspecialidadHamburguesa@update_estado']);

//bebidas
Route::resource('ControlProductoBebida','ControllerProductoBebida');
Route::resource('EspecialidadControlBebida','ControllerEspecialidadHamburguesa');
Route::resource('ExtrasHamburguesa', 'ControllerHamburguesaExtras');
Route::resource('ExtrasSubHamburguesa','ControllerExtrasSubHamburguesa');
Route::get('ControlProductoHamburguesa/create/estadoProduc/{update_estado}', ['as'=>'ControlProductoHamburguesa.update_estado','uses'=>'ControllerProductoHamburguesa@update_estado']);
Route::get('ExtrasHamburguesa/create/estadoProduc/{update_estado}', ['as'=>'ExtrasHamburguesa.update_estado','uses'=>'ControllerHamburguesaExtras@update_estado']);
Route::get('EspecialidadControlHamburguesa/create/estadoProduc/{update_estado}', ['as'=>'EspecialidadControlHamburguesa.update_estado','uses'=>'ControllerEspecialidadHamburguesa@update_estado']);





/*------ADMINISTRACION PARA LAS EMPRESAS FIN-------*/

