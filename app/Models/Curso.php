<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    
    protected $fillable=['Grado', 'Anio_Academico', 'Valor_Curso', 'Estado_Curso', 'Rut_Profesor'];
    public function asignatura(){
        return $this->hasMany('App\Models\Asignatura');
    }
    public function usuario_profesor(){
        return $this->belongsTo('App\Models\Usuario_profesor');
    }
    public function participante(){
        return $this->hasMany('App\Models\Participante');
    }
    public function getFullNameAttribute()
    {
        $grado=null;
        switch ($this->Grado) {
            case 0:
                $grado='PREKINDER';
            break;
            case 1:
                $grado='KINDER';
            break;
            case 2:
                $grado='PRIMERO';
            break;
            case 3:
                $grado='SEGUNDO';
            break;
            case 4:
                $grado='TERCERO';
            break;
            case 5:
                $grado='CUARTO';
            break;
            case 6:
                $grado='QUINTO';
            break;
            case 7:
                $grado='SEXTO';
            break;
            case 8:
                $grado='SEPTIMO';
            break;
            case 8:
                $grado='OCTAVO';
            break;
                
        }
       return ucfirst($grado) . ' ' . ucfirst($this->Valor_Curso);
    }
    protected $appends = ['full_name'];
}
