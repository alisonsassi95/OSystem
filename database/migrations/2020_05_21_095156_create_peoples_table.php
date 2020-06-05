<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->String('name', 45);
            $table->String('birthdate')->nullable();
            $table->String('genre', 1)->nullable();
            $table->String('cpf', 15)->unique();
            $table->String('rg', 10)->nullable();
            $table->String('address',200)->nullable();
            $table->String('number', 10)->nullable();
            $table->String('district', 45)->nullable();
            $table->String('complement', 45)->nullable();
            $table->String('cep', 15)->nullable();
            $table->String('telephone', 15)->nullable();
            $table->String('email', 80)->unique();
            $table->String('obs', 200)->nullable();
            $table->string('city', 200)->nullable();
            $table->String('state',2)->nullable();
            //Chave estrangeira de Perfil
            $table->integer('profile')->unsigned()->nullable();
            $table->foreign('profile')->references('id')->on('profiles');
            // Chave estrangeira de Perfil
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
        Schema::dropIfExists('peoples');
    }
}
