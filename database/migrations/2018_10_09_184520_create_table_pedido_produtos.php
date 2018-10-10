<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePedidoProdutos extends Migration
{
    public function up()
    {
        Schema::create('pedido_produtos', function(Blueprint $table)
		{
			$table->increments('id');
			//$table->foreign('pedido_id')->references('id')->on('pedidos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->string('pedido_id', 191);
			//$table->foreign('produto_id')->references('id')->on('produtos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->string('produto_id', 191);
			$table->string('status', 191);
			$table->string('valor', 191);
			$table->string('desconto', 191);
			$table->string('cupom_desconto_id', 191);
			$table->timestamps();
		});
    }
    public function down()
    {
        Schema::dropIfExists('pedido_produtos');
    }
}
