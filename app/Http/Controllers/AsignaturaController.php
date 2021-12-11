<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;
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
            'Rut'=>'required|digits_between:0,10',
            'Nombre'=>'required|regex:/^[\pL\s\-]+$/u',
            'ApellidoP'=>'required|regex:/^[a-zA-Z]+$/u',
            'ApellidoM'=>'required|regex:/^[a-zA-Z]+$/u',
            'AnioI'=>"required|digits:4",
            'Cargo'=>'required',
            'Imagen'=>'required|image',
            'Estado'=>'required',
            'addmore.*' => 'required',
        ]);
        $imagenes = $request->file('Imagen')->store('public/asignaturas');
        $url = Storage::url($imagenes);

        Asignatura::create([
            'Rut_Asignatura'=>$request->Rut,
            'Nombre_Asignatura'=>$request->Nombre,
            'ApellidoP_Asignatura'=>$request->ApellidoP,
            'ApellidoM_Asignatura'=>$request->ApellidoM,
            'AñoInicio_Asignatura'=>$request->AnioI,
            'Cargo_Asignatura'=>$request->Cargo,
            'Imagen'=>$url,
            'Estado_Asignatura'=>$request->Estado
        ]);
        
        return redirect()->route('admin.asignatura.create')->with('info', 'se creo el/la asignatura exitosamente');
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
            'Nombre'=>'required|regex:/^[\pL\s\-]+$/u',
            'ApellidoP'=>'required|regex:/^[a-zA-Z]+$/u',
            'ApellidoM'=>'required|regex:/^[a-zA-Z]+$/u',
            'AnioI'=>"required|digits:4",
            'Cargo'=>'required',
            'Imagen'=>'image',
            'Estado'=>'required',
        ]);
        $Estado=$request->Estado==1 ? 'active':'inactive';
        if($request->hasFile('Imagen')){
            $urleliminada = str_replace('storage', 'public', $asignatura->Imagen);
            Storage::delete($urleliminada);
            $imagenes = $request->file('Imagen')->store('public/asignaturas');
            $url = Storage::url($imagenes);
            $asignatura->update([
                'Rut_Asignatura'=>$request->Rut,
                'Nombre_Asignatura'=>$request->Nombre,
                'ApellidoP_Asignatura'=>$request->ApellidoP,
                'ApellidoM_Asignatura'=>$request->ApellidoM,
                'AñoInicio_Asignatura'=>$request->AnioI,
                'Cargo_Asignatura'=>$request->Cargo,
                'Imagen'=>$url,
                'Estado_Asignatura'=>$request->Estado
            ]);
        }else{
            $asignatura->update([
                'Rut_Asignatura'=>$request->Rut,
                'Nombre_Asignatura'=>$request->Nombre,
                'ApellidoP_Asignatura'=>$request->ApellidoP,
                'ApellidoM_Asignatura'=>$request->ApellidoM,
                'AñoInicio_Asignatura'=>$request->AnioI,
                'Cargo_Asignatura'=>$request->Cargo,
                'Estado_Asignatura'=>$request->Estado
            ]);
        }
        
        
        
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
        $asignatura=Asignatura::where('Rut_Asignatura', $asignatura)->first();
        $url = str_replace('storage', 'public', $asignatura->Imagen);
        Storage::delete($url);

        $asignatura->delete();
        return redirect()->route('admin.asignatura.index');
    }
}
