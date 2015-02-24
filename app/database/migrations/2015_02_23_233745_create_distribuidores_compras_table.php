<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistribuidoresComprasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('distribuidores_compras', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_producto');
			$table->integer('cantidad');
			$table->string('articulo');
			$table->integer('precioCompra');
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
		Schema::drop('distribuidores_compras');
	}

}
