<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    use HasFactory;
    protected $primaryKey = 'Rut';
    protected $fillable=['Rut', 'Nombre_Psicologo', 'DigitoV_Psicologo', 'ApellidoP_Psicologo', 'ApellidoM_Psicologo', 'Hora_Inicio', 'Hora_Termino', 'Especialidad', 'Imagen', 'Telefono_Contacto'];
}
