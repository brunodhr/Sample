<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterGalleryImagesDropColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('link');
            $table->dropColumn('label_link');
            $table->dropColumn('target');

            $table->string('subtitle', 191)->after('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallery_images', function (Blueprint $table) {
            $table->string('name', 191);
            $table->string('description', 191);
            $table->string('link', 191);
            $table->string('label_link', 191);
            $table->string('target', 191)->default('_self');

            $table->dropColumn('subtitle');
        });
    }
}
