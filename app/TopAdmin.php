<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TopAdmin extends Model {

	protected $table = 'admin';
	protected $primaryKey = 'codigo';
	
	public $timestamps = false;

}
