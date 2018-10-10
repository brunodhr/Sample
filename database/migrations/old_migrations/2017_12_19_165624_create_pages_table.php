<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('author_id');
			$table->string('title', 191);
			$table->text('excerpt', 65535)->nullable();
			$table->text('body', 65535)->nullable();
			$table->string('image', 191)->nullable();
			$table->string('slug', 191)->unique();
			$table->string('seo_title', 191)->nullable();
			$table->text('meta_description', 65535)->nullable();
			$table->text('meta_keywords', 65535)->nullable();
			$table->enum('status', array('PUBLISHED','PENDING','DRAFT'))->default('DRAFT');
			$table->boolean('exibir_menu')->default(0);
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
		Schema::drop('pages');
	}

}
