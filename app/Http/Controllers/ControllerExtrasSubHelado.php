<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerExtrasSubHelado extends ControllerExtrasSub {

    public function __construct(){

        $this->routes = 'heladomenu';
        $this->categoria = 9;
        $this->formRoute = 'ExtrasSubHelado';


    }

}
