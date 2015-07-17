<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartment extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("department",function($table) {
			$table->increments("dep_id");
			$table->text("dep_name");
			$table->integer("position");
			$table->integer("comment");
			$table->text("icon");
			$table->tinyInteger("home");
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
		//
	}

}
