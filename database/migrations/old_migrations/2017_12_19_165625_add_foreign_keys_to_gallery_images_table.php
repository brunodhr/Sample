<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGalleryImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gallery_images', function(Blueprint $table)
		{
			$table->foreign('gallery_id')->references('id')->on('galleries')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gallery_images', function(Blueprint $table)
		{
			$table->dropForeign('gallery_images_gallery_id_foreign');
		});
	}

}
