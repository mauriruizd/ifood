<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

	protected $table = 'pedidos';
	protected $primaryKey ='codigo';
	
	public $timestamps = false;

	public function detalle(){
		return $this->hasMany('App\PedidoDetalle', 'pedido_codigo', 'codigo');
	}

}
