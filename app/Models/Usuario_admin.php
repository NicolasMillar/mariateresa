<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_admin extends Model
{
    use HasFactory;
    protected $table = "usuario_admin";
    protected $primaryKey = 'Rut';
    protected $fillable=['Rut', 'DigitoV_admin', 'Nombre_admin', 'ApellidoP_admin', 'ApellidoM_admin', 'Contraseña', 'Estado_admin', 'FechaInicio_admin', 'FechaTermino_admin', 'Imagen'];

    protected $appends = ['full_name'];
}
