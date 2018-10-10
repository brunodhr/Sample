<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produtos extends Migration
{
    public function up()
    {
        Schema::create('produtos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome', 191);
			$table->string('descricao', 191);
			$table->string('valor', 191);
			$table->string('imagem', 191);
			$table->string('ativo', 191);
			$table->timestamps();
		});
    }
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
