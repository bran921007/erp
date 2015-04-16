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

		Cliente::create([
			'nombre'=>'casual',
			'apellido'=>'',
			'email'=>'',
			'telefono'=>'',
			'direccion'=>'',
			'cedula'=>''
			]);

		Cliente::create([
			'nombre'=>'Miguel',
			'apellido'=>'Perez',
			'email'=>'',
			'telefono'=>'809-221-6611',
			'direccion'=>'',
			'cedula'=>''
			]);

		Cliente::create([
			'nombre'=>'Francisco',
			'apellido'=>'Perez',
			'email'=>'franciscoperez583@gmail.com',
			'telefono'=>'809-858-6191',
			'direccion'=>'',
			'cedula'=>''
			]);

		Cliente::create([
			'nombre'=>'Amalita',
			'apellido'=>'Perez',
			'email'=>'',
			'telefono'=>'849-248-3803',
			'direccion'=>'',
			'cedula'=>''
			]);




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
