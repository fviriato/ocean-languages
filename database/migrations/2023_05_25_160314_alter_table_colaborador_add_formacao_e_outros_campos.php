<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableColaboradorAddFormacaoEOutrosCampos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('colaboradors', function (Blueprint $table) {
            $table->string('formacao')->after('salario')->nullable();
            $table->double('valor_hora_aula', 10, 2)->after('formacao')->nullable();
            $table->time('segunda_inicio')->after('valor_hora_aula')->nullable();
            $table->time('segunda_termino')->after('segunda_inicio')->nullable();
            $table->time('terca_inicio')->after('segunda_termino')->nullable();
            $table->time('terca_termino')->after('terca_inicio')->nullable();
            $table->time('quarta_inicio')->after('terca_termino')->nullable();
            $table->time('quarta_termino')->after('quarta_inicio')->nullable();
            $table->time('quinta_inicio')->after('quarta_termino')->nullable();
            $table->time('quinta_termino')->after('quinta_inicio')->nullable();
            $table->time('sexta_inicio')->after('quinta_termino')->nullable();
            $table->time('sexta_termino')->after('sexta_inicio')->nullable();
            $table->time('sabado_inicio')->after('sexta_termino')->nullable();
            $table->time('sabado_termino')->after('sabado_inicio')->nullable();
            $table->time('domingo_inicio')->after('sabado_termino')->nullable();
            $table->time('domingo_termino')->after('domingo_inicio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('colaboradors', function (Blueprint $table) {
            $table->dropColumn('domingo_termino');
            $table->dropColumn('domingo_inicio');
            $table->dropColumn('sabado_termino');
            $table->dropColumn('sabado_inicio');
            $table->dropColumn('sexta_termino');
            $table->dropColumn('sexta_inicio');
            $table->dropColumn('quinta_termino');
            $table->dropColumn('quinta_inicio');
            $table->dropColumn('quarta_termino');
            $table->dropColumn('quarta_inicio');
            $table->dropColumn('terca_termino');
            $table->dropColumn('terca_inicio');
            $table->dropColumn('segunda_termino');
            $table->dropColumn('segunda_inicio');
            $table->dropColumn('valor_hora_aula');
            $table->dropColumn('formacao');
        });
    }
}
