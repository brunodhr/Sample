<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHighlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('highlights', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('model', 100);
			$table->integer('foreign_key')->unsigned()->nullable();
			$table->string('title', 100)->nullable();
			$table->text('summary', 65535)->nullable();
			$table->string('link', 150)->nullable();
			$table->text('image', 65535)->nullable();
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
		Schema::drop('highlights');
	}

}
