<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistentes', function (Blueprint $table) {
            $table->integer('Rut_Asistente');
            $table->char('DigitoV_Asistente');
            $table->string('Nombre_Asistente');
            $table->string('ApellidoP_Asistente');
            $table->String('ApellidoV_Asistente');
            $table->year('AñoInicio_Asistente');
            $table->year('AñoTermino_Asistente')->nullable();
            $table->String('Cargo_Asistente');
            $table->String('Estado_Asistente');
            $table->bigInteger('TelefonoC_Asistente');
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
        Schema::dropIfExists('asistentes');
    }
}
