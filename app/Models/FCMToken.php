<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FCMToken extends Model
{
    use HasFactory;
    protected $fillable=['Rut', 'token'];
    protected $table = "f_c_m_tokens";

    public function usuario_alumno(){
        return $this->belongsTo('App\Models\Usuario_alumno');
    }
}
