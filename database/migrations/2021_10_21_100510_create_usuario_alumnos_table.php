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
            $table->unsignedInteger('Rut_Alumno');
            $table->char('DigitoV_Alumno');
            $table->string('Nombre_Alumno');
            $table->string('ApellidoP_Alumno');
            $table->string('ApellidoM_Alumno');
            $table->string('Direccion_Alumno');
            $table->string('Comuna_Alumno');
            $table->date('FechaNacimiento_Alumno');
            $table->string('Contraseña_Alumno');
            $table->string('Estado_Alumno');
            $table->date('FechaIngreso_Alumno');
            $table->date('FechaSalida_Alumno')->nullable();
            $table->string('Imagen');
            $table->primary('Rut_Alumno');
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
