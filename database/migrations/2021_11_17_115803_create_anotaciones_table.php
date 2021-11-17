<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnotacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anotaciones', function (Blueprint $table) {
            $table->id();
            $table->text('Descripcion_Anotacion');
            $table->string('Tipo_Anotacion');
            $table->unsignedInteger('ID_Asignatura');
            $table->foreign('ID_Asignatura')->references('id')->on('asignaturas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('Rut_Alumno');
            $table->foreign('Rut_Alumno')->references('Rut_Alumno')->on('usuario_alumnos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('anotaciones');
    }
}
