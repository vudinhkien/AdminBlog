<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNews extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function ($table) {
		$table->increments('news_id');
		$table->text('title');
		$table->text('images');
		$table->text('tomtat');
		$table->longText('content');
		$table->integer('cat_id');
		$table->integer('dep_id');
		$table->tinyInteger('hot');
		$table->date('ngaydangbai');
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
		Schema::drop('news');
	}

}
