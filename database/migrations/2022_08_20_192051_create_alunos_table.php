<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('matricula',8)->nullable();
            $table->unsignedBigInteger('escola_id')->nullable();
            $table->unsignedBigInteger('escolaridade_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('escola_id')->references('id')->on('escolas');
            $table->unique('user_id');
            $table->foreign('escolaridade_id')->references('id')->on('escolaridades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->dropForeign('alunos_escolaridade_id_foreign');
            $table->dropForeign('alunos_escola_id_foreign');
            $table->dropForeign('alunos_user_id_foreign');
        });
        Schema::dropIfExists('alunos');
    }
}
