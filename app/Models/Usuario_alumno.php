<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Usuario_alumno extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'Rut';

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
    public function f_c_m_tokens(){
        return $this->hasMany('App\Models\FCMToken');
    }
    protected $fillable=['Rut', 'DigitoV_Alumno', 'Nombre_Alumno', 'ApellidoP_Alumno', 'ApellidoM_Alumno', 'Direccion_Alumno', 'Comuna_Alumno', 'FechaNacimiento_Alumno', 'Contraseña', 'Estado_Alumno', 'FechaIngreso_Alumno', 'FechaSalida_Alumno', 'Imagen'];
}
