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
            $table->string('Estado_Asignatura');
            $table->unsignedBigInteger('ID_Curso');
            $table->foreign('ID_Curso')->references('id')->on('cursos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('ID_Categoria');
            $table->foreign('ID_Categoria')->references('id')->on('categoria_asignaturas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('Rut_Profesor')->nullable();
            $table->foreign('Rut_Profesor')->references('Rut')->on('usuario_profesores')->onDelete('set null')->onUpdate('cascade');
            $table->unique(['ID_Curso', 'ID_Categoria']);
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
