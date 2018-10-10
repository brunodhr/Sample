<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGalleryMidiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gallery_midias', function(Blueprint $table)
		{
			$table->foreign('gallery_id', 'gallery_images_gallery_id_foreign')->references('id')->on('galleries')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gallery_midias', function(Blueprint $table)
		{
			$table->dropForeign('gallery_images_gallery_id_foreign');
		});
	}

}
