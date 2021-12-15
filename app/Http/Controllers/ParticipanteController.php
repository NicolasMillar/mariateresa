<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Participante;
use App\Models\Usuario_alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipanteController extends Controller
{
    public function create(Curso $curso)
    {
        
        $date= \Carbon\Carbon::now();
        $year =date('Y', strtotime($date));
        $filter=DB::table('participantes')->select('Rut')->leftjoin('cursos', 'participantes.ID_Curso', '=', 'cursos.id')
        ->where('cursos.Anio_Academico','=', $year)->get();
        $alumnos=Usuario_alumno::where('Estado_Alumno', '=', 'active')->whereNotIn('Rut', $filter->pluck('Rut'))->get();
        return view('admin.participantes.create', compact('year', 'alumnos', 'curso'));
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
}
