<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerProductoVegana extends ProductoController {

    public function __construct(){

        $this->routes = 'veganamenu';
        $this->categoria = 10;
        $this->formRoute = 'ControlProductoVegana';


    }


}
