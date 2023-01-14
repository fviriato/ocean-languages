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
            $table->unsignedBigInteger('escolaridade_id')->nullable();
            $table->string('profissao')->nullable();
            $table->timestamps();
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('escolaridade_id')->references('id')->on('escolaridades');
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
            $table->dropForeign('responsavels_escolaridade_id_foreign');
            $table->dropForeign('responsavels_aluno_id_foreign');
        });
        Schema::dropIfExists('responsavels');
    }
}
