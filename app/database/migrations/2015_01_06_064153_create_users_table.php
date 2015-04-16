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
			$table->string('email');
			$table->string('password');
			$table->string('cedula');
			$table->string('direccion');
			$table->string('remember_token')->nullable();
			$table->enum('estado', array('activado', 'desactivado'));
			$table->enum('nivel', array('empleado', 'admin'));
			$table->timestamps();
		});


		// User testing default
		DB::table('users')->insert(
		array(
			'nombre'=>'Amalia',
			'apellido'=>'Linarez',
			'email'=>'linaresamalia@gmail.com',
			'password'=>Hash::make('playadiamante'),
			'nivel'=>'admin'
			)
		);

		User::create([
			'nombre'	=>'Mairolys',
			'apellido'=>'Sagrario',
			'email'		=>'alicia2840@gmail.com',
			'password'=>Hash::make('oriolys'),
			'nivel'		=>'empleado'

			]);

		User::create([
			'nombre'	=>'Francisco',
			'apellido'=>'Perez',
			'email'		=>'franciscoperez583@gmail.com',
			'password'=>Hash::make('behavior.10'),
			'nivel'		=>'admin'

			]);

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
