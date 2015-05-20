<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('missions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('description');
			$table->string('payment_id')->references('id')->on('payments');
			$table->string('user_id')->references('id')->on('users');
			$table->datetime('deadline')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('missions');
	}

}
