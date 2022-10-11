<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aula_idioma_id');
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->enum('tipo', ['avaliativa', 'complementar']);
            $table->date('data_aplicacao');
            $table->date('data_entrega');
            $table->enum('status', ['aplicada', 'em_correcao', 'finalizada']);
            $table->float('nota')->nullable();
            $table->timestamps();
            $table->foreign('aula_idioma_id')->references('id')->on('aula_idiomas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atividades', function (Blueprint $table) {
            $table->dropForeign('atividades_aula_idioma_id_foreign');
        });
        Schema::dropIfExists('atividades');
    }
}
