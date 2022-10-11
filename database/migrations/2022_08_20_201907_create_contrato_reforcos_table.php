<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoReforcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_reforcos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idioma_disciplina_id');
            $table->unsignedBigInteger('contrato_id');
            $table->timestamps();
            $table->foreign('idioma_disciplina_id')->references('id')->on('idioma_disciplinas');
            $table->foreign('contrato_id')->references('id')->on('contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contrato_reforcos', function (Blueprint $table) {
            $table->dropForeign('contrato_reforcos_idioma_disciplina_id_foreign');
            $table->dropForeign('contrato_reforcos_contrato_id_foreign');
        });
        Schema::dropIfExists('contrato_reforcos');
    }
}
