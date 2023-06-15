<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colaborador_id');
            $table->unsignedBigInteger('disciplina_id');
            $table->date('data_cadastro');
            $table->timestamps();
            $table->foreign('colaborador_id')->references('id')->on('colaboradors');
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('colaborador_disciplinas', function (Blueprint $table) {
            $table->dropForeign('colaborador_disciplinas_disciplina_id_foreign');
            $table->dropForeign('colaborador_disciplinas_colaborador_id_foreign');
        });
        Schema::dropIfExists('colaborador_disciplinas');
    }
}
