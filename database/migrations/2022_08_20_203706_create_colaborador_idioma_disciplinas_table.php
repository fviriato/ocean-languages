<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorIdiomaDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador_idioma_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colaborador_id');
            $table->unsignedBigInteger('idioma_disciplina_id');
            $table->date('data_casdastro');
            $table->timestamps();
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
        Schema::table('colaborador_idioma_disciplinas', function (Blueprint $table) {
            $table->dropForeign('colaborador_idioma_disciplinas_idioma_disciplina_id_foreign');
            $table->dropForeign('colaborador_idioma_disciplinas_colaborador_id_foreign');
        });
        Schema::dropIfExists('colaborador_idioma_disciplinas');
    }
}
