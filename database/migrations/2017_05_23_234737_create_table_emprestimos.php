<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmprestimos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            //Colunas
            $table->increments('id');

            $table->unsignedInteger('exemplar_id')->nullable();
            $table->unsignedInteger('leitor_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('status_id')->nullable();

            $table->dateTime('data_inicial')->nullable();
            $table->dateTime('data_final')->nullable();
            $table->dateTime('data_retorno')->nullable();

            //Default
            $table->softDeletes();
            $table->timestamps();

            //Foreign key
            $table->foreign('exemplar_id')->references('id')->on('exemplares');
            $table->foreign('leitor_id')->references('id')->on('leitores');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
