<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;
    
    public function asignatura(){
        return $this->belongsTo('App\Models\Asignatura');
    }
}
