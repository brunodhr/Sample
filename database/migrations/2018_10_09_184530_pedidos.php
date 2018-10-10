<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedidos extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function(Blueprint $table)
		{
            $table->increments('id');
            //$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->string('user_id', 191);
			$table->string('status', 191);
			$table->timestamps();
		});
    }
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
