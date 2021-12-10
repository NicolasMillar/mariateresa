<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->date('FechaTermino_Imparticion')->nullable();
            $table->date('FechaInicio_Imparticion');
            $table->unsignedBigInteger('ID_Asignatura');
            $table->foreign('ID_Asignatura')->references('id')->on('asignaturas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('Rut_Profesor')->nullable();
            $table->foreign('Rut_Profesor')->references('Rut')->on('usuario_profesores')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('profesors');
    }
}
