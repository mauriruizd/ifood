<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerProductoHamburguesa extends ProductoController {

    public function __construct(){

        $this->routes = 'hamburguesamenu';
        $this->categoria = 1;
        $this->formRoute = 'ControlProductoHamburguesa';


    }

}
