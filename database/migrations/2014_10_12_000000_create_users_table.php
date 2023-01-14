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
            $table->date('data_nascimento');
            $table->unsignedBigInteger('genero_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cpf', 11)->unique()->nullable();
            $table->string('rg', 14)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->enum('tipo', ['aluno', 'responsavel_aluno', 'professor', 'colaborador', 'master']);
            $table->string('foto')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
