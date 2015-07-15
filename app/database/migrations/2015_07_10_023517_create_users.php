<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	   Schema::create('users', function ($table) {
		$table->increments('id');
		$table->string('email');
		$table->string('password', 60);
		$table->string('name');
		$table->string('nickname');
		$table->string('avatar');
		$table->string('phone');
		$table->string('address');
		$table->tinyInteger('gender');
		$table->tinyInteger('active');
		$table->rememberToken();
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
