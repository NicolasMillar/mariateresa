<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anotacion extends Model
{
    protected $fillable=['Descripcion_Anotacion', 'Tipo_Anotacion', 'ID_Asignatura', 'Rut', 'created_at' ];
    use HasFactory;
    protected $table = "anotaciones";
    
    public function asignatura(){
        return $this->belongsTo('App\Models\Asignatura');
    }
    public function usuario_alumno(){
        return $this->belongsTo('App\Models\Usuario_alumno');
    }
}
