<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('apellido');
			$table->string('email');
			$table->string('telefono');
			$table->string('direccion');
			$table->string('cedula');
			$table->timestamps();
		});

        Cliente::create(['nombre' => 'casual', 'apellido' => '', 'email' => '', 'telefono' => '', 'direccion' => '', 'cedula' => '']);
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clientes');
	}

}
