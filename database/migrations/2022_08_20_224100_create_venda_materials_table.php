<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendaMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('material_didatico_id');
            $table->date('data_venda');
            $table->double('preco_venda',10,2);
            $table->integer('quantidade');
            $table->timestamps();
            $table->foreign('contrato_id')->references('id')->on('contratos');
            $table->foreign('material_didatico_id')->references('id')->on('material_didaticos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('venda_materials', function (Blueprint $table) {
            $table->dropForeign('venda_materials_contrato_id_foreign');
            $table->dropForeign('venda_materials_material_didatico_id_foreign');
        });

        Schema::dropIfExists('venda_materials');
    }
}
