<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_idiomas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrato_id');
            $table->enum('tipo', ['particular', 'grupo']);
            $table->unsignedBigInteger('idioma_disciplina_id');
            $table->timestamps();
            $table->foreign('contrato_id')->references('id')->on('contratos');
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
        Schema::table('contrato_idiomas', function (Blueprint $table) {
            $table->dropForeign('contrato_idiomas_idioma_disciplina_id_foreign');
            $table->dropForeign('contrato_idiomas_contrato_id_foreign');
        });
        Schema::dropIfExists('contrato_idiomas');
    }
}
