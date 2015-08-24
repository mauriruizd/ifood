<?php namespace App\Http\Controllers\TopAdmin;

use Auth;

use App\Http\Requests;
use Hash;

class TopAdminPanel extends Controller
{
	public function __construct(){
		$this->middleware('auth',['only'=>'control']);
	}
	public function login(){
		return view('topadmin.login');
	}

}
