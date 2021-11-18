<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('Rut_Alumno');
            $table->foreign('Rut_Alumno')->references('Rut_Alumno')->on('usuario_alumnos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('ID_Curso');
            $table->foreign('ID_Curso')->references('id')->on('cursos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('participantes');
    }
}
