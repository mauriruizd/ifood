<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCategorias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categorias_fast_food', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre')->unique();
			$table->string('slug');
			$table->string('logo');
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
		Schema::drop('categorias_fast_food');
	}

}
