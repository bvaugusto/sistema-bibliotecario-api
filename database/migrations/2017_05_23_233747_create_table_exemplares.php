php <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExemplares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exemplares', function (Blueprint $table) {
            //Campos
            $table->increments('id');

            $table->unsignedInteger('status_livro_id')->nullable();
            $table->unsignedInteger('livro_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();

            $table->string('descricao', 255)->nullable();

            //Foreign key
            $table->foreign('status_livro_id')->references('id')->on('status_livro')->after('id');
            $table->foreign('livro_id')->references('id')->on('livros')->after('status_livro_id');
            $table->foreign('user_id')->references('id')->on('users')->after('livro_id');

            //Default
            $table->softDeletes();
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
        Schema::dropIfExists('exemplares');
    }
}
