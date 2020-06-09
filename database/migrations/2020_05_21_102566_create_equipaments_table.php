<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipaments', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name', 45)->nullable(); 
            $table->string('mark', 45)->nullable();
            $table->string('model', 45)->nullable(); 
            $table->string('serialnumber', 50)->unique();
            $table->text('description')->nullable(); 
            //Chave estrangeira de UsuÃ¡rio
            $table->integer('peoples_id')->unsigned()->nullable();
            $table->foreign('peoples_id')->references('id')->on('peoples');
            // Chave estrangeira de UsuÃ¡rio 
            $table->boolean('active')->default(true); 
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
        Schema::dropIfExists('equipaments');
    }
}
