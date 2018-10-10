<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBannersNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('name', 191)->nullable()->change();
            $table->string('description', 191)->nullable()->change();
            $table->string('link', 191)->nullable()->change();
            $table->string('label_link', 191)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('name', 191)->change();
            $table->string('description', 191)->change();
            $table->string('link', 191)->change();
            $table->string('label_link', 191)->change();
        });
    }
}
