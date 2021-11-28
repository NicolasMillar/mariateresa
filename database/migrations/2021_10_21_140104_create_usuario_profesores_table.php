<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_profesores', function (Blueprint $table) {
            $table->unsignedInteger('Rut');
            $table->char('DigitoV_Profesor');
            $table->string('Nombre_Profesor');
            $table->string('ApellidoP_Profesor');
            $table->string('ApellidoM_Profesor');
            $table->string('Contraseña');
            $table->string('Estado_Profesor');
            $table->date('FechaInicio_Profesor');
            $table->date('FechaTermino_Profesor');
            $table->string('Imagen');
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
        Schema::dropIfExists('usuario_profesores');
    }
}
