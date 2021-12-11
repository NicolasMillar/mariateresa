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
    public function poder(){
        return $this->hasMany('App\Models\Poder');
    }
    public function calificacion(){
        return $this->hasMany('App\Models\Calificacion');
    }
    public function participante(){
        return $this->hasMany('App\Models\Participante');
    }
    protected $fillable=['Rut_Alumno', 'DigitoV_Alumno', 'Nombre_Alumno', 'ApellidoP_Alumno', 'ApellidoM_Alumno', 'Direccion_Alumno', 'Comuna_Alumno', 'FechaNacimiento_Alumno', 'Contraseña_Alumno', 'Estado_Alumno', 'FechaIngreso_Alumno', 'FechaSalida_Alumno', 'Imagen'];
}
