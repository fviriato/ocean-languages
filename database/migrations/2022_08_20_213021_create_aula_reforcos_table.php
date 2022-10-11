<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulaReforcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_reforcos', function (Blueprint $table) {
            $table->id();
            $table->date('data_aula');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('colaborador_id');
            $table->unsignedBigInteger('idioma_disciplina_id');
            $table->enum('status', ['planejada', 'ministrada', 'cancelada']);
            $table->enum('presenca_aluno', ['presente', 'ausente']);
            $table->timestamps();
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('colaborador_id')->references('id')->on('colaboradors');
            $table->foreign('idioma_disciplina_id')->references('id')->on('idioma_disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aula_reforcos', function (Blueprint $table) {
            $table->dropForeign('aula_reforcos_idioma_disciplina_id_foreign');
            $table->dropForeign('aula_reforcos_colaborador_id_foreign');
            $table->dropForeign('aula_reforcos_aluno_id_foreign');
        });
        Schema::dropIfExists('aula_reforcos');
    }
}
