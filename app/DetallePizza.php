<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePizza extends Model {

	protected $table = 'cat_pizza_detalles';
	protected $primaryKey = 'codigo';

	public $timestamps = false;

	protected $fillable = ['codigo','cat_pizza_masa_codigo','cat_pizza_tamanho_codigo','cat_pizza_esp_codigo','precio','estado'];

}