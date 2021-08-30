<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('protocolo',25);
            $table->string('digitro',25);
            $table->string('matricula',25);
            $table->string('nome', 100);
            $table->string('cpf', 15);
            $table->string('email', 30);
            $table->string('setor', 30);
            $table->string('telefone', 20);
            $table->string('assunto', 30);
            $table->string('motivo', 30);
            $table->string('documento', 200)->nullable();
            $table->longText('observacao')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
