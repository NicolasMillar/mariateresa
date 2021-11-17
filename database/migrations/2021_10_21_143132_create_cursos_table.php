<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->integer('Grado');
            $table->year('Anio_Academico');
            $table->integer('Periodo_Academico');
            $table->char('Valor_Curso');
            $table->string('Estado_Curso');
            $table->unsignedInteger('Rut_Profesor')->nullable();
            $table->foreign('Rut_Profesor')->references('Rut_Profesor')->on('usuario_profesores')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('cursos');
    }
}
