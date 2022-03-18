<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario_alumno;
use Illuminate\Support\Facades\DB;


class AnotacionController extends Controller
{
    public function index(Usuario_alumno $alumno){   
        $anio= \Carbon\Carbon::now();
        $year =date('Y', strtotime($anio));
        $anotaciones = DB::table('anotaciones')->join('asignaturas', 'asignaturas.id', '=', 'anotaciones.ID_Asignatura')->join('cursos', 'cursos.id', '=', 'asignaturas.ID_Curso')->where('Rut', '=', $alumno->Rut)->where('cursos.Anio_Academico', '=', $year)->get();
        return view('admin.anotaciones.index', compact('anotaciones'));
    }
    
    public function profesor(){
        $alumnos = Usuario_Alumno::All();
        return view('admin.anotaciones.profesoranotaciones', compact('alumnos'));
    }
    public function anotacionesalumno(Request $request){
        echo $request->Rut;
    }
}
