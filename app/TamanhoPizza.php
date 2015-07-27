<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TamanhoPizza extends Model {

	protected $table = 'cat_pizza_tamanhos';
	protected $primaryKey = 'codigo';

	public $timestamps = false;

}