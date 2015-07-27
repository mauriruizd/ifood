<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model {

	protected $table = 'favoritos';
	protected $primaryKey = 'codigo';

	public $timestamps = false;

}
