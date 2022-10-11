<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('curso_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('modalidade', ['presencial', 'online', 'hibrido']);
            $table->date('data_inicio');
            $table->date('data_termino');
            $table->time('hora_inicio');
            $table->time('hora_termino');
            $table->enum('primeiro_dia_semana', ['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo']);
            $table->enum('segundo_dia_semana', ['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo']);
            $table->string('status');
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos');
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
        Schema::create('turmas', function (Blueprint $table) {
            $table->dropForeign('turmas_curso_id_foreign');
            $table->dropForeign('turmas_user_id_foreign');
        });
        Schema::dropIfExists('turmas');
    }
}
