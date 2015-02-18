<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransfersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transfers', function(Blueprint $table)
		{
			$table->increments('ID');
			$table->integer('ID_user');
			$table->integer('ID_method');
			$table->integer('Balance');
			$table->enum('Transfer', ['En Espera', 'Cancelado', 'Emitido', 'Completado']);
			$table->enum('Estado', ['false', 'true']);
			$table->enum('Schedule', ['false', 'true']);
			$table->timestamp('Schedule_Automatic')->nullable();
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
		Schema::drop('transfers');
	}

}
