<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfiguracionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configuraciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_user');
			$table->string('empresa');
			$table->string('rnc');
			$table->string('telefono');
			$table->string('direccion');
			$table->string('ciudad');
			$table->string('paises');
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
		Schema::drop('configuraciones');
	}

}
