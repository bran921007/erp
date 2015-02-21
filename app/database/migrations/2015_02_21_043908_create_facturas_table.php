<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFacturasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facturas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('producto_id');
			$table->string('articulo');
			$table->string('cantidad');
			$table->string('precio_unidad');
			$table->string('precio_total');
			$table->string('subtotal');
			$table->string('descuento');
			$table->string('ITBIS');
			$table->string('total');
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
		Schema::drop('facturas');
	}

}
