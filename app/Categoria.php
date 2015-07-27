<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

	protected $table = 'categorias';
	protected $primaryKey ='codigo';

	public $timestamps = false;

}
