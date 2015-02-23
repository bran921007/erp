<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidosdetallesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidosdetalles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_pedido');
			$table->integer('id_producto');
			$table->string('articulo');
			$table->integer('cantidad');
			$table->integer('precio');
			$table->integer('total');
			$table->date('fecha');
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
		Schema::drop('pedidosdetalles');
	}

}
