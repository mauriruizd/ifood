<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

	protected $table = 'persona_empresas';
	protected $primaryKey ='codigo';
	
	public $timestamps = false;

}
