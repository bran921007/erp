<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMethodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('methods', function(Blueprint $table)
		{
			$table->increments('ID');
			$table->integer('ID_user');
			$table->string('Bank_Name');
			$table->integer('Account_Number');
			$table->enum('Tipo', ['Personal', 'Corporativo']);
			$table->enum('Estado', ['false', 'true']);
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
		Schema::drop('methods');
	}

}
