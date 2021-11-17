<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_alumno extends Model
{
    use HasFactory;
    protected $primaryKey = 'Rut_Alumno';

    public function alergia(){
        return $this->hasMany('App\Models\Alergia');
    }
    public function anotacion(){
        return $this->hasMany('App\Models\Anotacion');
    }
    public function enfermedades_cronica(){
        return $this->hasMany('App\Models\Enfermedades_cronica');
    }
}
