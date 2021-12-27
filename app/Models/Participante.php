<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;

    public function curso(){
        return $this->belongsTo('App\Models\Curso');
    }
    public function usuario_alumno(){
        return $this->belongsTo('App\Models\Usuario_alumno');
    }
    protected $fillable=['Rut', 'ID_Curso'];
}
