<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerProductoHelado extends ProductoController {

    public function __construct(){

        $this->routes = 'orientalmenu';
        $this->categoria = 5;
        $this->formRoute = 'ControlProductoOriental';


    }

}
