<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriasEmpresa extends Model {

	protected $table = 'persona_empresas_categoria';
	protected $primaryKey ='codigo';
	
	public $timestamps = false;

	public function empresas(){
		return $this->hasOne('App\Empresa', 'codigo', 'empresa_codigo');
	}
}
