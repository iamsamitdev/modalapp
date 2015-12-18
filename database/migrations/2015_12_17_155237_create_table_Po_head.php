<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePoHead extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Po_Heads', function(Blueprint $table)
		{
			$table->increments('Po_Head_Id');
			$table->string('PoNo',15);
			$table->string('CustCode', 15);
			$table->string('CusName', 255);
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
		Schema::drop('Po_Heads');
	}

}
