<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblVendaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_venda', function(Blueprint $table)
		{
			$table->increments('int_venda_id');
			$table->integer('order_id')->nullable();
			$table->string('str_email', 85)->nullable();
			$table->integer('int_payment_id')->nullable();
			$table->integer('int_product_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_venda');
	}

}
