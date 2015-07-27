<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionCliente extends Model {

	protected $table = 'persona_cliente_direcciones';
	protected $primaryKey ='codigo';
	
	public $timestamps = false;

}
