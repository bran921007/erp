<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransaccionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transacciones', function(Blueprint $table)
		{
			$table->increments('ID');
			$table->integer('ID_transaction');
			$table->integer('ID_user');
			$table->string('Description');
			$table->string('Statement_description');
			$table->integer('Amount_received');
			$table->integer('Fee');
			$table->integer('Amount_total');
			$table->integer('Rate_amount');
			$table->integer('Dollar_amount');
			$table->string('Full_name');
			$table->integer('ID_customer');
			$table->string('Address');
			$table->string('City');
			$table->integer('Phone');
			$table->integer('Identification')->nullable();
			$table->enum('Estado', ['false', 'true']);
			$table->enum('Transfer', ['false', 'true']);
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
		Schema::drop('transacciones');
	}

}
