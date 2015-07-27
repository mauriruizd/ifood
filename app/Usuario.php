<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

	protected $table = 'persona_clientes';
	protected $primaryKey ='codigo';
	
	public $timestamps = false;

}
