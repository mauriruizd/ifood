<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

	protected $table = 'productos';
	protected $primaryKey ='codigo';
	
	public $timestamps = false;
	protected $fillable = ['denominacion','imagen_url','descripcion','categoria_codigo','subcategoria_codigo','empresa_codigo','estado','precio'];

}
