<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCupomDescontos extends Migration
{
    public function up()
    {
        Schema::create('cupom_descontos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome', 191);
			$table->string('localizador', 191);
			$table->string('desconto', 191);
			$table->string('modo_desconto', 191);
			$table->string('limite', 191);
			$table->string('modo_limite', 191);
			$table->string('dthr_validade', 191);
			$table->string('ativo', 191);
			$table->timestamps();
		});
    }
    public function down()
    {
        Schema::dropIfExists('cupom_descontos');
    }
}
