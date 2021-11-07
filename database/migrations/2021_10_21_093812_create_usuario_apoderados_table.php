<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioApoderadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_apoderados', function (Blueprint $table) {
            $table->integer('Rut_Apoderado');
            $table->char('DigitoV_Apoderado');
            $table->string('Nombre_Apoderado');
            $table->string('ApellidoP_Apoderado');
            $table->string('ApellidoM_Apoderado');
            $table->bigInteger('TelefonoC_Apoderado');
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
        Schema::dropIfExists('usuario_apoderados');
    }
}
