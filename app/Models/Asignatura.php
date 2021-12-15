<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    public function material(){
        return $this->hasMany('App\Models\Material');
    }
    public function anotacion(){
        return $this->hasMany('App\Models\Anotacion');
    }
    public function prueba(){
        return $this->hasMany('App\Models\Prueba');
    }
    public function curso(){
        return $this->belongsTo('App\Models\Curso');
    }
    public function categoria_asignatura(){
        return $this->belongsTo('App\Models\Categoria_Asignatura');
    }
    public function profesor(){
        return $this->hasMany('App\Models\Profesor');
    }
}
