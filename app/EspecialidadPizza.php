<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EspecialidadPizza extends Model {

	protected $table = 'cat_pizza_especialidades';
	protected $primaryKey = 'codigo';

	public $timestamps = false;

	protected $fillable = ['nombre', 'empresa_codigo', 'estado'];


}
