<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cargo_id');
            $table->string('registro');
            $table->double('salario', 10, 2);
            $table->enum('forma_remuneracao', ['hora', 'mes']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cargo_id')->references('id')->on('cargos');
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
            $table->dropForeign('colaboradors_user_id_foreign');
            $table->dropForeign('colaboradors_cargo_id_foreign');
        });
        Schema::dropIfExists('colaboradors');
    }
}
