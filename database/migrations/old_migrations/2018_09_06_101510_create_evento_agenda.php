<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_agenda', function(Blueprint $table){
			$table->increments('id');
            $table->string('titulo');
            $table->datetime('data');
            $table->string('banner');
            $table->string('slug');
            $table->text('descricao');
            $table->string('endereco');
            $table->string('local');
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
        Schema::dropIfExists('evento_agenda');
    }
}
