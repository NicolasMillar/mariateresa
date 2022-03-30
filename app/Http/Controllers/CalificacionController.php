<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Calificacion;
use App\Models\Prueba;
use App\Models\Participante;
use App\Models\Usuario_alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalificacionController extends Controller
{
    public function index(Asignatura $asignatura, Usuario_alumno $alumno)
    {
        $pruebas = Prueba::where('ID_Asignatura', '=', $asignatura->id)->get();
        $notas = DB::table('calificaciones')->join('pruebas', 'pruebas.id', '=', 'calificaciones.ID_Pruebas')->where('Rut', '=', $alumno->Rut)->whereIn('ID_Pruebas', $pruebas->pluck('id'))->get();
        return view('admin.calificaciones.index', compact('notas'));
    }
    public function profesor(Asignatura $asignatura)
    {
        $pruebas = Prueba::where('ID_Asignatura', '=', $asignatura->id)->get();
        $notas = DB::table('calificaciones')->join('pruebas', 'pruebas.id', '=', 'calificaciones.ID_Pruebas')->whereIn('ID_Pruebas', $pruebas->pluck('id'))->get();
        $participantes = Participante::where('ID_Curso', '=', $asignatura->ID_Curso)->get();
        $alumnos = DB::table('usuario_alumnos')->whereIn('Rut',  $participantes->pluck('Rut'))->get();
        $cualquiera=$asignatura;
        $contador=0;
        $rut=0;
        $cont=count($notas);
        for($i=0;$i<$cont;$i++){
            if($rut == 0){
                $rut=$notas[$i]->Rut;
            }
            if($rut == $notas[$i]->Rut){
                $contador++;
            }
        }
        echo $pruebas;
        return view('admin.calificaciones.profesor', compact('notas','cualquiera','contador', 'alumnos'));
    }
    

}
