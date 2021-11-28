<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_alumnos', function (Blueprint $table) {
            $table->unsignedInteger('Rut');
            $table->char('DigitoV_Alumno');
            $table->string('Nombre_Alumno');
            $table->string('ApellidoP_Alumno');
            $table->string('ApellidoM_Alumno');
            $table->tinyInteger('Etnia');
            $table->string('Nombre_Etnia')->nullable();
            $table->string('Direccion_Alumno');
            $table->string('Comuna_Alumno');
            $table->date('FechaNacimiento_Alumno');
            $table->tinyInteger('Discapacidad');
            $table->string('NombreDiscapacidad_Alumno')->nullable();
            $table->string('Contraseña');
            $table->string('Estado_Alumno');
            $table->date('FechaIngreso_Alumno');
            $table->date('FechaSalida_Alumno')->nullable();
            $table->date('Imagen');
            $table->primary('Rut');
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
        Schema::dropIfExists('usuario_alumnos');
    }
}
