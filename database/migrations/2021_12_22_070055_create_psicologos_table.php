<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsicologosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psicologos', function (Blueprint $table) {
            $table->unsignedInteger('Rut');
            $table->char('DigitoV_Psicologo');
            $table->string('Nombre_Psicologo');
            $table->string('ApellidoP_Psicologo');
            $table->string('ApellidoM_Psicologo');
            $table->time('Hora_Inicio');
            $table->time('Hora_Termino');
            $table->string('Especialidad');
            $table->string('Imagen');
            $table->bigInteger('Telefono_Contacto');
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
        Schema::dropIfExists('psicologos');
    }
}
