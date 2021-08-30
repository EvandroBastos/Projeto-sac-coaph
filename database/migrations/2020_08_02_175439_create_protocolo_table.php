<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocoloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocolo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('protocolo');
            $table->string('matricula',30);
            $table->string('digitro',30);

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');

            $table->integer('setor_id')->unsigned();
            $table->foreign('setor_id')->references('id')->on('setor');

            $table->integer('motivo_id')->unsigned();
            $table->foreign('motivo_id')->references('id')->on('motivo');


            $table->integer('assunto_id')->unsigned();
            $table->foreign('assunto_id')->references('id')->on('assunto');

            $table->integer('descricao_id')->unsigned();
            $table->foreign('descricao_id')->references('id')->on('descricao');

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
        Schema::dropIfExists('protocolo');
    }
}
