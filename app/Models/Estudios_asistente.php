<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudios_asistente extends Model
{
    use HasFactory;
    public function asistente(){
        return $this->belongsTo('App\Models\Asistente');
    }
    protected $fillable=['Nombre_EstudiosA', 'Rut_Asistente'];
}
