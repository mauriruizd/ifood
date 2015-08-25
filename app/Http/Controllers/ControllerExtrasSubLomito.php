<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ControllerExtrasSubLomito extends ControllerExtrasSub {

	public function __construct(){
		$this->categoria = 2;
		$this->routes = 'lomitomenu';
		$this->formRoute = 'ExtrasSubLomitos';
	}

}
