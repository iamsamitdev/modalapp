<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePoDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Po_Details', function(Blueprint $table)
		{
			$table->increments('Po_Detail_Id');
			$table->integer('Po_Head_Id');
			$table->string('ProductCode', 255);
			$table->string('ProductName', 255);
			$table->decimal('Qty', 10, 2);
			$table->decimal('UnitPrice', 10, 2);
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
		Schema::drop('Po_Details');
	}

}
