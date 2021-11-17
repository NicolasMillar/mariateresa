<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poder extends Model
{
    use HasFactory;
    protected $table = "poderes";
    
    public function usuario_apoderado(){
        return $this->belongsTo('App\Models\Usuario_apoderado');
    }
    public function usuario_alumno(){
        return $this->belongsTo('App\Models\Usuario_alumno');
    }

}
