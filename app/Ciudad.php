<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model {

	protected $table = 'ciudades';
    protected $primaryKey = 'codigo';

    public $timestamps = false;

}
