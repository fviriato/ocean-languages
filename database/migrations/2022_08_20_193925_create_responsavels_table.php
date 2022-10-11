<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsavelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsavels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->string('responsavel_nome')->nullable();
            $table->date('responsavel_data_nascimento')->nullable();
            $table->string('responsavel_email')->nullable();
            $table->string('responsavel_cpf', 11)->nullable();
            $table->string('responsavel_rg')->nullable();
            $table->string('responsavel_telefone', 11)->nullable();
            $table->unsignedBigInteger('responsavel_escolaridade_id')->nullable();
            $table->string('responsavel_profissao')->nullable();
            $table->string('responsavel_cep',8)->nullable();
            $table->string('responsavel_logradouro')->nullable();
            $table->string('responsavel_numero')->nullable();
            $table->string('responsavel_complemento')->nullable();
            $table->string('responsavel_bairro')->nullable();
            $table->string('responsavel_municipio')->nullable();
            $table->string('responsavel_estado')->nullable();
            $table->timestamps();
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('responsavel_escolaridade_id')->references('id')->on('escolaridades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('responsavels', function (Blueprint $table) {
            $table->dropForeign('responsavels_responsavel_escolaridade_id_foreign');
            $table->dropForeign('responsavels_aluno_id_foreign');
        });
        Schema::dropIfExists('responsavels');
    }
}
