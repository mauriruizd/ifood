<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerEspecialidadBebida extends ControllerEspecialidad {

    public function __construct(){

        $this->routes = 'bebidamenu';
        $this->categoria = 8;
        $this->formRoute = 'EspecialidadControlBebida';


    }



}
