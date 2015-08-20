<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model {

    protected $table = 'subcategorias';
    protected $primaryKey = 'codigo';

    public $timestamps = false;
    protected $fillable =['nombre','categoria_codigo','estado','empresa_codigo'];
}
