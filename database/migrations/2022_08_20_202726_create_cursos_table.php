<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('disciplina_id');
            $table->unsignedBigInteger('estagio_id');
            $table->unsignedBigInteger('nivel_id');
            $table->string('observacoes')->nullable();
            $table->timestamps();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
            $table->foreign('estagio_id')->references('id')->on('estagios');
            $table->foreign('nivel_id')->references('id')->on('nivels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign('cursos_disciplina_id_foreign');
            $table->dropForeign('cursos_estagio_id_foreign');
            $table->dropForeign('cursos_nivel_id_foreign');
        });
        Schema::dropIfExists('cursos');
    }
}
