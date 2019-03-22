<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriaDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_documento', function (Blueprint $table) {
            $table->integer('documento_id')->unsigned();
            $table->foreign('documento_id')->references('id')->on('documentos');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')
                    ->on('categorias')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_documento');
    }
}
