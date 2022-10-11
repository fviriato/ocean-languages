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
            $table->string('name');
            $table->date('data_nascimento'); //criado
            $table->unsignedBigInteger('genero_id'); //criado
            $table->string('email')->unique();
            $table->string('cpf', 11)->unique()->nullable(); //criado
            $table->string('rg', 11)->nullable(); //criado
            $table->string('telefone', 11)->nullable(); //criado
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('tipo', ['aluno', 'professor', 'colaborador', 'master']);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('genero_id')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_genero_id_foreign');
        });
        Schema::dropIfExists('users');
    }
}
