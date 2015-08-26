<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model {

	protected $table = 'pedidos_detalles';
	protected $primaryKey = 'codigo';

	public $timestamps = false;

	public function extras(){
		return $this->hasMany('App\PedidoDetalleExtra', 'pdetalle_codigo', 'codigo');
	}

}
