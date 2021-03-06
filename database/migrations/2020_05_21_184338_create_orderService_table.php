<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

$now = new DateTime();
$datetime = $now->format('Y-m-d H:i:s'); 
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
            $table->DATETIME('data_hora')->nullable();
            $table->DATETIME('data_hora_entrega')->nullable();
            //Chave estrangeira de Equipamento
            $table->integer('equipaments_id')->unsigned()->nullable();
            $table->foreign('equipaments_id')->references('id')->on('equipaments');
            // Chave estrangeira de Equipamento 
            //Chave estrangeira de UsuÃ¡rio
            $table->integer('peoples_id')->unsigned()->nullable();
            $table->foreign('peoples_id')->references('id')->on('peoples');
            // Chave estrangeira de UsuÃ¡rio 
            //Chave estrangeira de Orcamento
            $table->integer('estimate_id')->unsigned()->nullable();
            $table->foreign('estimate_id')->references('id')->on('estimate');
            // Chave estrangeira de Orcamento 
            //Chave estrangeira de Status
            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('status');
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
