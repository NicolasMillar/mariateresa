<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_Asignatura');
            $table->string('Tipo_Asignatura');
            $table->string('Estado_Asignatura');
            $table->unsignedBigInteger('ID_Curso');
            $table->foreign('ID_Curso')->references('id')->on('cursos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('ID_Categoria');
            $table->foreign('ID_Categoria')->references('id')->on('categoria_asignaturas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('asignaturas');
    }
}
