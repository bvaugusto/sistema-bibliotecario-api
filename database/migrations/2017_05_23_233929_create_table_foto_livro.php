<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFotoLivro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_livro', function (Blueprint $table) {
            //Campos
            $table->increments('id');

            $table->unsignedInteger('livro_id')->nullable();
            $table->unsignedInteger('status_id')->nullable();

            $table->string('nome_imagem', 255)->nullable();
            $table->string('url_imagem', 255)->nullable();

            //Default
            $table->softDeletes();
            $table->timestamps();

            //Foreign Keys
            $table->foreign('livro_id')->references('id')->on('livros')->after('id');
            $table->foreign('status_id')->references('id')->on('status')->after('livro_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_livro');
    }
}
