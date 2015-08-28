<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerLomitoExtras extends ProductosExtrasMaster {

	public function __construct(){
        $this->routes = 'lomitomenu';
        $this->formRoute = 'ExtrasLomitos';
        $this->categoria = 2;

    }

}
