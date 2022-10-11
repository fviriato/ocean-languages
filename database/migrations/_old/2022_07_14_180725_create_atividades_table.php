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
            $table->unsignedBigInteger('aula_idiomas_id');
            $table->string('nome');
            $table->string('descricao');
            $table->enum('tipo', ['avaliativa', 'complementar']);
            $table->float('nota');
            $table->date('data_aplicacao');
            $table->date('data_entrega');
            $table->enum('status', ['planajada', 'aplicada', 'em_correcao', 'finalizada'])->nullable();
            $table->timestamps();
            $table->foreign('aula_idiomas_id')->references('id')->on('atividades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->dropForeign('atividades_aula_idiomas_id_forign');
        });
        Schema::dropIfExists('atividades');
    }
}
