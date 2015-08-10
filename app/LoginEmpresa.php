<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginEmpresa extends Model {
	
	protected $table = 'users';
   public $timestamps= false;
   protected $primaryKey='codigo';
	

}
