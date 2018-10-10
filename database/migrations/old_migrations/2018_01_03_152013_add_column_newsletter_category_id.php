<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnNewsletterCategoryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('newsletters', function (Blueprint $table) {
            $table->integer('newsletter_category_id')->unsigned()->after('id');
            $table->foreign('newsletter_category_id', 'newsletters_newsletter_categories_id_foreign')->references('id')->on('newsletter_categories')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('newsletters', function (Blueprint $table) {
            $table->dropForeign('newsletter_newsletter_categories_id_foreign');
            $table->dropColumn('newsletter_category_id');
        });
    }
}
