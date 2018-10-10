<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAccordionItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('accordion_items', function(Blueprint $table)
		{
			$table->foreign('accordion_id', 'accordions_accordion_id_foreign')->references('id')->on('accordions')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('accordion_items', function(Blueprint $table)
		{
			$table->dropForeign('accordions_accordion_id_foreign');
		});
	}

}
