<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Titulo_profesor extends Model
{
    use HasFactory;
    protected $table = "titulo_profesores";
    protected $fillable=['Nombre_Titulo', 'Rut_Profesor'];

    public function usuario_profesor(){
        return $this->belongsTo('App\Models\Usuario_profesor');
    }
}
