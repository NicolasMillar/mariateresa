<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $table = "unidades";
    public function asignatura(){
        return $this->belongsTo('App\Models\Asignatura');
    }
    public function material(){
        return $this->hasMany('App\Models\Material');
    }
}
