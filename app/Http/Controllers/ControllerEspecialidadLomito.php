<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerEspecialidadLomito extends ControllerEspecialidad {
	public function __construct(){
		$this->categoria = 2;
	}


}
