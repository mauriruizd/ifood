<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerExtrasSubCombo extends ControllerExtrasSub {

    public function __construct(){

        $this->routes = 'combomenu';
        $this->categoria = 11;
        $this->formRoute = 'ExtrasSubCombo';


    }

}
