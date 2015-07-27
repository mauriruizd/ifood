<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfigPizza extends Model {

	protected $table = 'cat_pizza_config';
	protected $primaryKey = 'codigo';

	public $timestamps = false;

}
