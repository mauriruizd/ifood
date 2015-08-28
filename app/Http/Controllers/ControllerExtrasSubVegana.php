<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerExtrasSubVegana extends ControllerExtrasSub {

    public function __construct(){

        $this->routes = 'Veganamenu';
        $this->categoria = 10;
        $this->formRoute = 'ExtrasSubVegana';


    }

}
