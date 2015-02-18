<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('ID_customer');
			$table->integer('ID_user');
			$table->string('Email');
			$table->string('Full_name');
			$table->string('Address');
			$table->string('City');
			$table->integer('Phone');
			$table->integer('Identification');
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('customers');
	}

}
