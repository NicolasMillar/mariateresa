<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Usuario_profesor;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "admin"){
            $cursos = Curso::all();
            return view('admin.cursos.index', compact('cursos'));
        }
        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "admin"){
            $anio= \Carbon\Carbon::now();
            $year =date('Y', strtotime($anio));
            $resto= DB::table('usuario_profesores')->join('cursos', 'cursos.Rut_Profesor', '=', 'usuario_profesores.Rut')->where('Anio_Academico', '=', $year)->select('usuario_profesores.Rut')->get();
            $profesor=Usuario_profesor::whereNotIn('Rut', $resto->pluck('Rut'))->get();
            return view('admin.cursos.create', compact('year', 'profesor'));
        }
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anio= \Carbon\Carbon::now();
        $year =date('Y', strtotime($anio));
        
        $request->validate([
            'Grado'=>'required|numeric',
            'Letra'=>'required|regex:/^[a-zA-Z]+$/u',
            'Estado'=>'required',
            'Profesor'=>'digits_between:0,10',
        ]);
        $validacion=Curso::where('Grado', '=', $request->Grado)->where('Valor_Curso', '=', $request->Letra)->where('Anio_Academico', '=', $request->Anio)->first();
        if($validacion!=null){
            return redirect()->route('admin.curso.create')->with('info', 'no se creo el curso. la combinacion de año, grado y letra ya existe');
        }
        $Estado=$request->Estado==1 ? 'active':'inactive';
        
        Curso::create([
            'Grado'=>$request->Grado,
            'Anio_Academico'=>$year,
            'Valor_Curso'=>$request->Letra,
            'Estado_Curso'=>$Estado,
            'Rut_Profesor'=>$request->Profesor
        ]);
        return redirect()->route('admin.curso.create')->with('info', 'se creo el/la asistente exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "admin"){
            return view('admin.cursos.edit', compact('curso'));
        }
        return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'Estado'=>'required',
            'Profesor'=>'digits_between:0,10',
        ]);
        $Estado=$request->Estado==1 ? 'active':'inactive';
        $curso->update([
            'Estado_Curso'=>$Estado,
            'Rut_Profesor'=>$request->Profesor
        ]);
        return redirect()->route('admin.curso.index')->with('info', 'la actualizacion fue exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($curso)
    {
        $curso=Curso::where('id', $curso)->first();
        $curso->delete();
        return redirect()->route('admin.curso.index');
    }
}
