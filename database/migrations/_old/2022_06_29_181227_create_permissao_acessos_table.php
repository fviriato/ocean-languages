<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissaoAcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao_acessos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('permissao_id');
            $table->enum('leitura',['sim','nao']);
            $table->enum('edicao',['sim','nao']);
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('permissao_id')->references('id')->on('permissaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('permissao_acessos', function (Blueprint $table) {
            $table->dropForeign('permissao_acessos_menu_id_foreign');
            $table->dropForeign('permissao_acessos_permissao_id_foreign');
        });
        Schema::dropIfExists('permissao_acessos');
    }
}
