<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerHamburguesaExtras extends ProductosExtrasMaster {

    public function __construct(){

        $this->routes = 'hamburguesamenu';
        $this->categoria = 1;
        $this->formRoute = 'ExtrasHamburguesa';


    }

}
