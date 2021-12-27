<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_Asignatura extends Model
{
    use HasFactory;
    protected $table = "categoria_asignaturas";
    protected $fillable=['Minimo_Grado', 'Maximo_Grado', 'Nombre_Categoria'];
    public function asignatura(){
        return $this->hasMany('App\Models\Asignatura');
    }
}
