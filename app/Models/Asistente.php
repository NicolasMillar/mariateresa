<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    use HasFactory;
    protected $primaryKey = 'Rut_Asistente';
    public function estudios_asistente(){
        return $this->hasMany('App\Models\Estudios_asistente');
    }
    protected $fillable=['Rut_Asistente', 'DigitoV_Asistente', 'Nombre_Asistente', 'ApellidoP_Asistente', 'ApellidoM_Asistente', 'AñoInicio_Asistente', 'AñoTermino_Asistente', 'Cargo_Asistente', 'Estado_Asistente', 'TelefonoC_Asistente', 'Imagen'];
}
