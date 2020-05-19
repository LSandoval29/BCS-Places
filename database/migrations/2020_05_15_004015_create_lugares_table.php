<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('municipioId');
            $table->unsignedBigInteger('categoriaId');
            $table->string('nombre')->unique();
            $table->string('direccion');
            $table->string('paginaWeb');
            $table->string('horario');
            $table->string('numTelefono');
            $table->string('descripcion');
            $table->string('imagen');
            $table->double('latitud');
            $table->double('longitud');
            $table->timestamps();

            $table->foreign('municipioId')->references('id')->on('municipios');
            $table->foreign('categoriaId')->references('id')->on('categorias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugars');
    }
}
