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
    
    public function profesor(Request $request){
        $asignaturaid=$request->asignatura;
        $alumnos = DB::table('usuario_alumnos')->join('participantes', 'participantes.Rut', '=', 'usuario_alumnos.Rut')->join('cursos', 'cursos.id', '=', 'participantes.ID_Curso')->join('asignaturas', 'asignaturas.ID_Curso' ,'=','cursos.id')->where('asignaturas.id', '=', $asignaturaid)->get();
        return view('admin.anotaciones.profesoranotaciones', compact('alumnos','asignaturaid'));
    }
    public function anotacionesalumno(Request $request){
        $anotaciones = DB::table('anotaciones')->join('asignaturas', 'asignaturas.id', '=', 'anotaciones.ID_Asignatura')->where('Rut', '=', $request->Rut)->get();
        $asignatura= $request->asignatura;
        return view('admin.anotaciones.alumnoanotaciones', compact('anotaciones', 'asignatura'));
    }
    public function anotacionesagregar(Request $request){
        echo $request->idasignatura;
    }
}
