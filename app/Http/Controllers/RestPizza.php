<?php namespace App\Http\Controllers;

use App\ConfigPizza;
use App\EspecialidadPizza;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RestPizza extends Controller {

	public function configuracion($id){
        return ConfigPizza::find($id);
    }

    public function especialidad($id){
        return EspecialidadPizza::find($id);
    }
}
