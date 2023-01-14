<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->string('numero');
            $table->date('inicio_vigencia')->nullable();
            $table->date('termino_vigencia')->nullable();
            $table->double('valor_mensal', 10, 2);
            $table->date('data_pagamento');
            $table->enum('primeiro_dia_semana', ['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo']);
            $table->enum('segundo_dia_semana', ['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo'])->nullable();
            $table->time('hora_inico');
            $table->time('hora_fim');
            $table->double('preco_venda_material_didatico', 10, 2);
            $table->integer('parcelas');
            $table->enum('status_contrato',['vigente','expirado']);
            $table->enum('tipo',['aula_particular','aula_grupo','consultoria_escolar']);
            $table->unique('aluno_id');
            $table->timestamps();
            $table->foreign('aluno_id')->references('id')->on('alunos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropForeign('contratos_aluno_id_foreign');
        });
        Schema::dropIfExists('contratos');
    }
}
