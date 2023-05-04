<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTabelaContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contratos', function (Blueprint $table) {

            $table->dropForeign('contratos_aluno_id_foreign');
            $table->dropColumn('aluno_id');
            $table->dropColumn('data_pagamento');
            $table->dropColumn('material_didatico');
            $table->dropColumn('primeiro_dia_semana');
            $table->dropColumn('segundo_dia_semana');
            $table->dropColumn('preco_venda_material_didatico');
            $table->dropColumn('hora_inico');
            $table->dropColumn('hora_fim');
            $table->dropColumn('numero');
            $table->dropColumn('inicio_vigencia');
            $table->dropColumn('termino_vigencia');
            $table->dropColumn('tipo');
        });

        Schema::table('contratos', function (Blueprint $table) {

            $table->string('data_pagamento')->after('valor_mensal');
            $table->double('material_didatico', 10, 2)->after('data_pagamento');
            $table->unsignedBigInteger('aluno_id')->after('id');
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->unsignedBigInteger('turma_id')->after('aluno_id');
            $table->foreign('turma_id')->references('id')->on('turmas');

            $table->enum('tipo', ['particular', 'grupo', 'reforco'])->after('status_contrato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
