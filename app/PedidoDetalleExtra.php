<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalleExtra extends Model {

	protected $table = 'pedidos_detalle_extras';
    protected $primaryKey = 'codigo';

    public $timestamps = false;

}
