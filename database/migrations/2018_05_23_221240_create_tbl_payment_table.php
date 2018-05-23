<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_payment', function(Blueprint $table)
		{
			$table->integer('int_payment_id', true);
			$table->dateTime('date')->nullable();
			$table->float('value', 10, 0)->nullable();
			$table->string('unit', 4)->nullable();
			$table->string('method', 45)->nullable();
			$table->integer('months')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_payment');
	}

}
