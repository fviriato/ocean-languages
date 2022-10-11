<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_idiomas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('turma_id');
            $table->date('data_aula');
            $table->enum('status', ['planejada', 'ministrada', 'cancelada']);
            $table->enum('presenca_aluno', ['presente', 'ausente']);
            $table->timestamps();
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('turma_id')->references('id')->on('turmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aula_idiomas', function (Blueprint $table) {
            $table->dropForeign('aula_idiomas_turma_id_foreign');
            $table->dropForeign('aula_idiomas_aluno_id_foreign');
        });

        Schema::dropIfExists('aula_idiomas');
    }
}
