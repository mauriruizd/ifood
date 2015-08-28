<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerEspecialidadVegana extends ControllerEspecialidad {

    public function __construct(){

        $this->routes = 'veganamenu';
        $this->categoria = 10;
        $this->formRoute = 'EspecialidadControlVegana';


    }

}
