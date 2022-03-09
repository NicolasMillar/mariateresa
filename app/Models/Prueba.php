<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;
    
    protected $fillable=['Nombre_Prueba','Fecha_Prueba','Semestre','ID_Asignatura'];

    public function asignatura(){
        return $this->belongsTo('App\Models\Asignatura');
    }
    public function calificacion(){
        return $this->hasMany('App\Models\Calificacion');
    }
}
