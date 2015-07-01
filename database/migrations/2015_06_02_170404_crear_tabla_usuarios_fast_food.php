<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuariosFastFood extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios_fast_food', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nickname');
			$table->string('nombre');
			$table->string('direccion');
			$table->float('direccion_lng')->nullable();
			$table->float('direccion_lat')->nullable();
			$table->string('mail');
			$table->string('contrasena');
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
		Schema::drop('usuarios_fast_food');
	}

}
