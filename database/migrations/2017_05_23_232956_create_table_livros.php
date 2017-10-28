<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            //Campos
            $table->increments('id');

            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('autor_id')->nullable();
            $table->unsignedInteger('catagoria_id')->nullable();
            $table->unsignedInteger('editora_id')->nullable();

            $table->string('isbn', 128)->nullable();
            $table->string('title', 128)->nullable();
            $table->string('subtitulo', 128)->nullable();
            $table->string('descricao', 255)->nullable();
            $table->string('ano', 10)->nullable();
            $table->string('num_pag', 10)->nullable();

            //Default
            $table->softDeletes();
            $table->timestamps();

            //Foreign key
            $table->foreign('user_id')->references('id')->on('users')->after('id');
            $table->foreign('autor_id')->references('id')->on('autores')->after('user_id');
            $table->foreign('catagoria_id')->references('id')->on('categorias')->after('autor_id');
            $table->foreign('editora_id')->references('id')->on('editoras')->after('catagoria_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
