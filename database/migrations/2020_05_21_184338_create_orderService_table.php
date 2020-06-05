<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateorderServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderService', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->text('problem');
            $table->time('data_hora');
            $table->time('data_hora_entrega')->nullable();
            //Chave estrangeira de Equipamento
            $table->integer('equipaments_id')->unsigned()->nullable();
            $table->foreign('equipaments_id')->references('id')->on('equipaments');
            // Chave estrangeira de Equipamento 
            //Chave estrangeira de UsuÃ¡rio
            $table->integer('peoples_id')->unsigned()->nullable();
            $table->foreign('peoples_id')->references('id')->on('peoples');
            // Chave estrangeira de UsuÃ¡rio 
            //Chave estrangeira de Orcamento
            //$table->integer('orcamento_id')->unsigned()->nullable();
            //$table->foreign('orcamento_id')->references('id')->on('orcamento');
            // Chave estrangeira de Orcamento 
            //Chave estrangeira de Status
            //$table->integer('status_id')->unsigned()->nullable();
            //$table->foreign('status_id')->references('id')->on('situacao');
            // Chave estrangeira de Status 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderService');
    }
}
