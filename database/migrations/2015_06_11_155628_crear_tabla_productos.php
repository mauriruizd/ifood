<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos_fast_food', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo');
			$table->string('descripcion')->nullable();
			$table->integer('id_empresa');
			$table->integer('id_categoria');
			$table->integer('precio');
			$table->string('imagen');
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
		Schema::drop('productos_fast_food');
	}

}
