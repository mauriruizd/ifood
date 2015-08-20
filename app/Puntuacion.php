<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model {

    protected $table = 'puntuacion';
    protected $primaryKey ='codigo';

    public $timestamps = false;

}
