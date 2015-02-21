<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistribuidoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('distribuidores', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('empresa');
			$table->string('email');
			$table->string('telefono');
			$table->string('direccion');
			$table->string('rnc');
			$table->string('cedula');
			$table->string('unidades');
			$table->string('total_pagado');
			$table->enum('estado', array('activado', 'desactivado'));
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
		Schema::drop('distribuidores');
	}

}
