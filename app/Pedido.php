<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

	protected $table = 'pedidos';
	protected $primaryKey ='codigo';
	
	public $timestamps = false;

}
