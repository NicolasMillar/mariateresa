<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnfermedadesCronicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedades_cronicas', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_Enfermedad');
            $table->string('precaucion');
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
        Schema::dropIfExists('enfermedades_cronicas');
    }
}
