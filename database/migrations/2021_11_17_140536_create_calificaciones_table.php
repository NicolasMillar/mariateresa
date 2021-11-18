<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->float('Notas', 3, 1);
            $table->unsignedInteger('Rut_Alumno');
            $table->foreign('Rut_Alumno')->references('Rut_Alumno')->on('usuario_alumnos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('ID_Pruebas');
            $table->foreign('ID_Pruebas')->references('id')->on('pruebas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('calificacions');
    }
}
