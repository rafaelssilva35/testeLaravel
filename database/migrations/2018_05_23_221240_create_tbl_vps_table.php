<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblVpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_vps', function(Blueprint $table)
		{
			$table->integer('int_vps_id', true);
			$table->string('int_product_id', 45)->nullable();
			$table->string('str_ip_address', 45)->nullable();
			$table->string('str_vps_name', 45)->nullable();
			$table->boolean('bool_ligado')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tbl_vps');
	}

}
