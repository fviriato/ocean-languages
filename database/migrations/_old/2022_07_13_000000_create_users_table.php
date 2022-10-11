<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            //adicionadas
            $table->date('data_nascimento')->nullable();
            $table->unsignedBigInteger('genero_id')->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('rg', 11)->nullable();
            $table->string('telefone', 11)->nullable();
            //
            $table->string('email')->unique();
            //adicionadas
            $table->string('responsavel_nome')->nullable();
            $table->date('responsavel_data_nascimento')->nullable();
            $table->string('responsavel_cpf', 11)->nullable();
            $table->string('responsavel_rg', 11)->nullable();
            $table->string('responsavel_telefone', 11)->nullable();
            $table->string('responsavel_email')->nullable();
            $table->enum('tipo_usuario',['aluno','professor','admin','master']);

            //
            $table->foreign('genero_id')->references('id')->on('generos');


            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('users_genero_id_foreign');
        });
        Schema::dropIfExists('users');
    }
}
