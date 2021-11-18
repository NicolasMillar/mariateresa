<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuxiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auxiliares', function (Blueprint $table) {
            $table->integer('Rut_Auxiliar');
            $table->char('DigitoV_Auxiliar');
            $table->string('Nombre_Auxiliar');
            $table->string('ApellidoP_Auxiliar');
            $table->String('ApellidoM_Auxiliar');
            $table->year('AñoInicio_Auxiliar');
            $table->year('AñoTermino_Auxiliar')->nullable();
            $table->string('Cargo_Auxiliar');
            $table->string('Estado_Auxiliar');
            $table->string('Imagen');
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
        Schema::dropIfExists('auxiliares');
    }
}
