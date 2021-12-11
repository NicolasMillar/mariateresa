<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_profesor extends Model
{
    use HasFactory;
    protected $table = "usuario_profesores";
    protected $primaryKey = 'Rut';
    protected $fillable=['Rut', 'DigitoV_Profesor', 'Nombre_Profesor', 'ApellidoP_Profesor', 'ApellidoM_Profesor', 'Contraseña', 'Estado_Profesor', 'FechaInicio_Profesor', 'FechaTermino_Profesor', 'Imagen'];

    public function titulo_profesor(){
        return $this->hasMany('App\Models\Titulo_profesor');
    }
    public function curso(){
        return $this->hasMany('App\Models\Curso');
    }
    public function profesor(){
        return $this->hasMany('App\Models\Profesor');
    }
    public function getFullNameAttribute()
    {
       return ucfirst($this->Nombre_Profesor) . ' ' . ucfirst($this->ApellidoP_Profesor);
    }
}
