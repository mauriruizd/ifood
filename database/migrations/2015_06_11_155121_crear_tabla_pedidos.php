<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPedidos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos_fast_food', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_usuario');
			$table->integer('id_producto');
			$table->integer('id_empresa');
			$table->integer('cantidad');
			$table->string('agregados')->nullable();
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
		Schema::drop('pedidos_fast_food');
	}

}
