<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTituloProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulo_profesores', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_Titulo');
            $table->unsignedInteger('Rut_Profesor');

            $table->foreign('Rut_Profesor')->references('Rut_Profesor')->on('usuario_profesores')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('titulo_profesores');
    }
}
