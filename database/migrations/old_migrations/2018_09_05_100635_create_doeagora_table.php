<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoeagoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doeagora', function(Blueprint $table){
			$table->increments('id');
            $table->string('tipocontribuicao')->default('unica');
            $table->string('contribuicao');
            $table->string('nome');
            $table->string('email');
            $table->string('numero1');
            $table->string('numero2')->nullable();
            $table->string('cpf', 15);
            $table->string('cep', 10);
            $table->string('cidade');
            $table->string('estado');
            $table->string('bairro');
            $table->string('logradouro');
            $table->string('complemento')->nullable();
            $table->string('numero');
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
        Schema::dropIfExists('doeagora');
    }
}