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
            $table->unsignedBigInteger('tipo_lancamento_id');
            $table->string('descricao');
            $table->double('valor', 10, 2);
            $table->date('data_lancamento');
            $table->date('data_vencimento');
            $table->enum('status', ['aberto', 'atrasado', 'quitado']);
            $table->timestamps();
            $table->foreign('tipo_lancamento_id')->references('id')->on('tipo_lancamentos');
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
            $table->dropForeign('lancamento_financeiros_tipo_lancamento_id_foreign');
        });
        Schema::dropIfExists('lancamento_financeiros');
    }
}
