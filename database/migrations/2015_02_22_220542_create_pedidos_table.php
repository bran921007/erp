<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_cliente');
			$table->enum('metodo', array('efectivo','tarjeta','banco'));
			$table->integer('subtotal');
			$table->integer('itbis');
			$table->integer('total');
			$table->enum('estado', array('pendiente','pagado'));
			$table->enum('tipo', array('cotizacion','venta'));
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
		Schema::drop('pedidos');
	}

}
