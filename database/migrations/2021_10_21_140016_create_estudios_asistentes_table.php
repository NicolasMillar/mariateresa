<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosAsistentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudios_asistentes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_EstudiosA');
            $table->unsignedInteger('Rut_Asistente');
            $table->foreign('Rut_Asistente')->references('Rut_Asistente')->on('asistentes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('estudios_asistentes');
    }
}
