<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoExtra extends Model {

    protected $table = 'productos_extras';
    protected $primaryKey = 'codigo';

    public $timestamps = false;

}