<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLancamentoFinanceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lancamento_financeiros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_id');
            $table->string('descricao');
            $table->double('valor', 10, 2);
            $table->date('data_lancamento');
            $table->date('data_vencimento');
            $table->date('data_quitacao');
            $table->enum('status', ['aberto', 'atrasado', 'quitado']);
            $table->string('notivo');
            $table->timestamps();
            $table->foreign('tipo_id')->references('id')->on('tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lancamento_financeiros', function (Blueprint $table) {
            $table->dropForeign('lancamento_financeiros_tipo_id_foreign');
        });
        Schema::dropIfExists('lancamento_financeiros');
    }
}
