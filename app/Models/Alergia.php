<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    use HasFactory;
    public function usuario_alumno(){
        return $this->belongsTo('App\Models\Usuario_alumno');
    }
}
