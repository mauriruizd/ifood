<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerProductoBebida extends ProductoController {

    public function __construct(){

        $this->routes = 'bebidamenu';
        $this->categoria = 8;
        $this->formRoute = 'ControlProductoBebida';


    }

}
