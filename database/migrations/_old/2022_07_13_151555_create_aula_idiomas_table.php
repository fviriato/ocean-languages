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
            $table->unsignedBigInteger('turma_id');
            $table->unsignedBigInteger('user_id');
            $table->date('data_aula');
            $table->enum('status', ['ministrada', 'cancelada', 'ferido', 'reposicao'])->nullable();
            $table->enum('presenca_aluno', ['presente', 'falta']);
            $table->timestamps();

            $table->foreign('turma_id')->references('id')->on('turmas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('aula_idiomas', function (Blueprint $table) {
            $table->dropForeign('aula_idiomas_turma_id_foreign');
            $table->dropForeign('aula_idiomas_user_id_foreign');
        });
        Schema::dropIfExists('aula_idiomas');
    }
}
