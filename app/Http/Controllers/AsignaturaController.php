<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Categoria_Asignatura;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaturas = Asignatura::all();
        return view('admin.asignaturas.index', compact('asignaturas'));
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
        return view('admin.asignaturas.create', compact('year'));
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
            'Categoria'=>'required|numeric',
            'Curso'=>'required|numeric',
            'Estado'=>'required|numeric',
            'Profesor'=>'required|numeric|digits_between:0,10'
        ]);
        $curso=Curso::where('id', '=', $request->Curso)->first();
        $categoria=DB::table('categoria_asignaturas')->where('id', '=', $request->Categoria)->first();
        $validacion=Asignatura::where('ID_Curso', '=', $request->Curso)->where('ID_Categoria', '=', $request->Categoria)->first();
        if($validacion!=null){
            return redirect()->route('admin.asignatura.create')->with('info', 'no se creo la asignatura. ya existe una asignatura con esta categoria para este curso');
        }else{
            if($curso->Grado>=$categoria->Minimo_Grado && $curso->Grado<=$categoria->Maximo_Grado){
                $Estado=$request->Estado==1 ? 'active':'inactive';
                $Nombre=$categoria->Nombre_Categoria.' '.$curso->full_name;
                Asignatura::create([
                    'Nombre_Asignatura'=>$Nombre,
                    'Estado_Asignatura'=>$Estado,
                    'ID_Categoria'=>$request->Categoria,
                    'ID_Curso'=>$request->Curso,
                    'Rut_Profesor'=>$request->Profesor
                ]);
                
                return redirect()->route('admin.asignatura.create')->with('info', 'se creo el/la asignatura exitosamente');
            }
            else{
                return redirect()->route('admin.asignatura.create')->with('info', 'El curso no esta en el rango de cursos aceptados por la categoria');
            }
            
        }
        
        
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
    public function edit(Asignatura $asignatura)
    {
        $anio= \Carbon\Carbon::now();
        $year =date('Y', strtotime($anio));
        return view('admin.asignaturas.edit', compact('asignatura', 'year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'Estado'=>'required|numeric',
            'Profesor'=>'required|numeric|digits_between:0,10'
        ]);
        $Estado=$request->Estado==1 ? 'active':'inactive';
        $asignatura->update([
            'Rut_Profesor'=>$request->Profesor,
            'Estado_Asignatura'=>$Estado
        ]);
            
        return redirect()->route('admin.asignatura.index')->with('info', 'la actualizacion fue exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($asignatura)
    {
        $asignatura=Asignatura::where('id', $asignatura)->first();

        $asignatura->delete();
        return redirect()->route('admin.asignatura.index');
    }
}
