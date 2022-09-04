<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Curso;
use App\Models\Participante;
use App\Models\Prueba;
use App\Models\Usuario_alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ParticipanteController extends Controller
{
    public function index(Curso $curso)
    {
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "admin"){
            $alumno = DB::table('usuario_alumnos')->join('participantes', 'participantes.Rut', '=', 'usuario_alumnos.Rut')->where('participantes.ID_Curso', '=', $curso->id)->get();
            $alumnos = Usuario_alumno::whereIn('Rut', $alumno->pluck('Rut'))->get();
            return view('admin.participantes.index', compact('alumnos'));
        }
        return redirect()->route('login');
    }

    public function create(Curso $curso)
    {
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "admin"){
            $date= \Carbon\Carbon::now();
            $year =date('Y', strtotime($date));
            $filter=DB::table('participantes')->select('Rut')->leftjoin('cursos', 'participantes.ID_Curso', '=', 'cursos.id')
            ->where('cursos.Anio_Academico','=', $year)->get();
            $alumnos=Usuario_alumno::where('Estado_Alumno', '=', 'active')->whereNotIn('Rut', $filter->pluck('Rut'))->get();
            return view('admin.participantes.create', compact('year', 'alumnos', 'curso'));
        }
        return redirect()->route('login');
    }
    public function store(Curso $curso, Request $request)
    {
        foreach ($request->checked as $key => $value) {

            Participante::create([
                'Rut'=>$value,
                'ID_Curso'=>$curso->id
            ]);

        }
        return redirect()->route('admin.curso.index')->with('info', 'la actualizacion fue exitosa');
    }
    public function hoja(Usuario_alumno $alumno){
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "admin"){
            $dbasignatura=DB::table('asignaturas')->select('asignaturas.id')->join('cursos', 'asignaturas.ID_Curso', '=', 'cursos.id')->join('participantes', 'cursos.id', '=', 'participantes.ID_Curso')->where('Estado_Curso', '=', 'active')->where('participantes.Rut', '=', $alumno->Rut)->get();
            $asignaturas=Asignatura::whereIn('id', $dbasignatura->pluck('id'))->get();
            $pruebas = Prueba::whereIn('ID_Asignatura', $asignaturas->pluck('id'))->get();
            $notas = DB::table('calificaciones')->join('pruebas', 'pruebas.id', '=', 'calificaciones.ID_Pruebas')->where('Rut', '=', $alumno->Rut)->whereIn('ID_Pruebas', $pruebas->pluck('id'))->get();
            $anio= \Carbon\Carbon::now();
            $year =date('Y', strtotime($anio));
            $anotaciones = DB::table('anotaciones')->join('asignaturas', 'asignaturas.id', '=', 'anotaciones.ID_Asignatura')->join('cursos', 'cursos.id', '=', 'asignaturas.ID_Curso')->where('Rut', '=', $alumno->Rut)->where('cursos.Anio_Academico', '=', $year)->get();
            $pdf=PDF::loadView('admin.participantes.hoja', ['asignaturas'=>$asignaturas, 'notas'=>$notas, 'anotaciones'=>$anotaciones]);
            return $pdf->stream();
        }
        return redirect()->route('login');
        //return view('admin.participantes.hoja', compact('asignaturas', 'notas', 'anotaciones'));
    }
}
