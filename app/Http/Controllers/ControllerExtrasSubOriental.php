<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerExtrasSubOriental extends ControllerExtrasSub {

    public function __construct(){

        $this->routes = 'orientalmenu';
        $this->categoria = 5;
        $this->formRoute = 'ExtrasSubOriental';


    }

}
