<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerHeladoExtras extends ProductosExtrasMaster {

    public function __construct(){

        $this->routes = 'heladomenu';
        $this->categoria = 9;
        $this->formRoute = 'ExtrasHelado';


    }

}
