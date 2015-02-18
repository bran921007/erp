<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('apellido');
			$table->string('empresa');
			$table->string('email');
			$table->string('password');
			$table->string('website');
			$table->string('cuenta_bancaria');
			$table->string('rnc');
			$table->string('direccion');
			$table->string('api_key');
			$table->string('estado');

			$table->timestamps();
		});


		// User testing default
		DB::table('users')->insert(
		array(
			'nombre'=>'Jhonn',
			'apellido'=>'Rodriguez',
			'email'=>'admin@rojo.com',
			'password'=>Hash::make('musica'),
			)
		);

	}




	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
