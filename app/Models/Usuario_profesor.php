<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_profesor extends Model
{
    use HasFactory;
    protected $table = "usuario_profesores";
    protected $primaryKey = 'Rut_Profesor';

    public function titulo_profesor(){
        return $this->hasMany('App\Models\Titulo_profesor');
    }
    public function curso(){
        return $this->hasMany('App\Models\Curso');
    }
    public function profesor(){
        return $this->hasMany('App\Models\Profesor');
    }
}
