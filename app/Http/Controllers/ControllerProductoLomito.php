<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerProductoLomito extends ProductoController  {
 public function __construct(){

	 $this->routes = 'lomitomenu';
	 $this->categoria = 2;
	 $this->formRoute = 'ControlProductoLomito';


 }


}
