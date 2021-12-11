<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable=['Grado', 'Anio_Academico', 'Valor_Curso', 'Estado_Curso', 'Rut_Profesor'];
    public function asignatura(){
        return $this->hasMany('App\Models\Asignatura');
    }
    public function usuario_profesor(){
        return $this->belongsTo('App\Models\Usuario_profesor');
    }
    public function participante(){
        return $this->hasMany('App\Models\Participante');
    }
    
}
