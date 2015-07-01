<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEmpresas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas_fast_food', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('telefono');
			$table->string('direccion');
			$table->float('direccion_lng');
			$table->float('direccion_lat');
			$table->string('email');
			$table->integer('precio_delivery');
			$table->integer('radio_cobertura_delivery');
			$table->string('logo')->nullable();
			$table->integer('id_cat_1');
			$table->integer('id_cat_2');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empresas_fast_food');
	}

}