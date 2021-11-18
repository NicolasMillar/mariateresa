<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    protected $table = "calificaciones";
    
    public function prueba(){
        return $this->belongsTo('App\Models\Prueba');
    }
    public function usuario_alumno(){
        return $this->belongsTo('App\Models\Usuario_alumno');
    }
}
