<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $table = "profesores";

    public function asignatura(){
        return $this->belongsTo('App\Models\Asignatura');
    }
    public function usuario_profesor(){
        return $this->belongsTo('App\Models\Usuario_profesor');
    }
}
