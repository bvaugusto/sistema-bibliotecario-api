<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLeitores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leitores', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('status_id')->nullable();

            $table->string('nome', 100)->nullable();
            $table->string('sobrenome', 100)->nullable();
            $table->string('email', 255);
            $table->string('endereco', 255)->nullable();
            $table->string('telefone', 100)->nullable();

            //Default
            $table->softDeletes();
            $table->timestamps();

            //Foreign Keys
            $table->foreign('status_id')->references('id')->on('status')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leitores');
    }
}