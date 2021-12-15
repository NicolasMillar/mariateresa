<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Facades\Config;
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
        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anio= \Carbon\Carbon::now();
        $year =date('Y', strtotime($anio));
        return view('admin.cursos.create', compact('year'));
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
            'Grado'=>['required', Rule::unique('cursos')->where(function ($query) use ($request) {
                return $query->where('Anio_Academico', $request->Anio)
                   ->where('Valor_Curso', $request->Letra);
             })],
            'Letra'=>'required|regex:/^[a-zA-Z]+$/u',
            'Anio'=>"required|digits:4",
            'Estado'=>'required',
            'Profesor'=>'digits_between:0,10',
        ]);
        
        $Estado=$request->Estado==1 ? 'active':'inactive';
        
        Curso::create([
            'Grado'=>$request->Grado,
            'Anio_Academico'=>$request->Anio,
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
        return view('admin.cursos.edit', compact('curso'));
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
