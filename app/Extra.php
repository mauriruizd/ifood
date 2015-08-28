<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model {

	protected $table = 'producto_sub_extras';
    protected $primaryKey = 'codigo';

    public $timestamps = false;

    protected $fillable = ['pextra_codigo', 'subcategoria_codigo', 'pespecialidad_codigo', 'precio_extra'];

    public function prodExtra(){
        return $this->hasOne('App\ProductoExtra', 'codigo', 'pextra_codigo');
    }
}
