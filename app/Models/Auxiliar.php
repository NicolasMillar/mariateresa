<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{
    use HasFactory;
    protected $table = "auxiliares";
    protected $primaryKey = 'Rut_Auxiliar';
    protected $fillable=['Rut_Auxiliar', 'DigitoV_Auxiliar', 'Nombre_Auxiliar', 'ApellidoP_Auxiliar', 'ApellidoM_Auxiliar', 'AñoInicio_Auxiliar', 'AñoTermino_Auxiliar', 'Cargo_Auxiliar', 'Estado_Auxiliar', 'Imagen'];
}
