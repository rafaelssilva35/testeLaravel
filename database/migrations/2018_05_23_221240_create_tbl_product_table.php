<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_product', function(Blueprint $table)
		{
			$table->integer('int_product_id', true);
			$table->string('product_alias', 45)->nullable();
			$table->string('os', 45)->nullable();
			$table->text('addons')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_product');
	}

}
