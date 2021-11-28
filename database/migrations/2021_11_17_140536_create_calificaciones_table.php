<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionesTable extends Migration
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
            $table->unsignedInteger('Rut');
            $table->foreign('Rut')->references('Rut')->on('usuario_alumnos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('ID_Pruebas');
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
