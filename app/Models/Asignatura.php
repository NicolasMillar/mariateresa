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
}
