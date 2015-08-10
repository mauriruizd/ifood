<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model {

	protected $table = 'producto_sub_extras';
    protected $primaryKey = 'codigo';

    public $timestamps = false;

}
