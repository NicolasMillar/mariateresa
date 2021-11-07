<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario_profesor extends Model
{
    use HasFactory;
    protected $table = "usuario_profesores";
    protected $primaryKey = 'Rut_Profesor';
}
