<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('client_name');
			$table->string('client_address')->nullable();
			$table->string('client_email');
			$table->string('description');
			$table->integer('price');
			$table->enum('status', ['payed', 'unpayed', 'canceled'])->default('unpayed');
			$table->string('stripe_transaction_id')->nullable();
			$table->string('shortLink')->nullable()->unique();
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
		Schema::drop('payments');
	}

}
