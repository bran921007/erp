<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tokens', function(Blueprint $table)
		{
			$table->increments('ID');
			$table->integer('ID_user');
			$table->string('Website');
			$table->string('API_Secret');
			$table->string('API_Key');
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
		Schema::drop('tokens');
	}

}
