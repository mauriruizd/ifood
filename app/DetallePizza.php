<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePizza extends Model {

	protected $table = 'cat_pizza_detalles';
	protected $primaryKey = 'codigo';

	public $timestamps = false;

}