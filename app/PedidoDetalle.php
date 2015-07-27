<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model {

	protected $table = 'pedidos_detalles';
	protected $primaryKey = 'codigo';

	public $timestamps = false;

}
