<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use Illuminate\Http\Request;
use App\Models\Estudios_asistente;
use Illuminate\Support\Facades\Storage;

class AsistenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistentes = Asistente::all();
        return view('admin.asistentes.index', compact('asistentes'));
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
        return view('admin.asistentes.create', compact('year'));
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
            'DV'=>'required|regex:/^[kK0-9 ]+$/',
            'Nombre'=>'required|regex:/^[\pL\s\-]+$/u',
            'ApellidoP'=>'required|regex:/^[a-zA-Z]+$/u',
            'ApellidoM'=>'required|regex:/^[a-zA-Z]+$/u',
            'AnioI'=>"required|digits:4",
            'Cargo'=>'required',
            'Imagen'=>'required|image',
            'Estado'=>'required',
            'addmore.*' => 'required',
        ]);
        $imagenes = $request->file('Imagen')->store('public/asistentes');
        $url = Storage::url($imagenes);
        $Estado=$request->Estado==1 ? 'active':'inactive';
        Asistente::create([
            'Rut_Asistente'=>$request->Rut,
            'DigitoV_Asistente'=>$request->DV,
            'Nombre_Asistente'=>$request->Nombre,
            'ApellidoP_Asistente'=>$request->ApellidoP,
            'ApellidoM_Asistente'=>$request->ApellidoM,
            'AñoInicio_Asistente'=>$request->AnioI,
            'Cargo_Asistente'=>$request->Cargo,
            'Imagen'=>$url,
            'Estado_Asistente'=>$Estado
        ]);
        foreach ($request->addmore as $key => $value) {

            Estudios_asistente::create([
                'Nombre_EstudiosA'=>$value,
                'Rut_Asistente'=>$request->Rut
            ]);

        }
        return redirect()->route('admin.asistente.create')->with('info', 'se creo el/la asistente exitosamente');
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
    public function edit(Asistente $asistente)
    {
        $anio= \Carbon\Carbon::now();
        $year =date('Y', strtotime($anio));
        return view('admin.asistentes.edit', compact('asistente', 'year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistente $asistente)
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
            $urleliminada = str_replace('storage', 'public', $asistente->Imagen);
            Storage::delete($urleliminada);
            $imagenes = $request->file('Imagen')->store('public/asistentes');
            $url = Storage::url($imagenes);
            $asistente->update([
                'Nombre_Asistente'=>$request->Nombre,
                'ApellidoP_Asistente'=>$request->ApellidoP,
                'ApellidoM_Asistente'=>$request->ApellidoM,
                'AñoInicio_Asistente'=>$request->AnioI,
                'Cargo_Asistente'=>$request->Cargo,
                'Imagen'=>$url,
                'Estado_Asistente'=>$request->Estado
            ]);
        }else{
            $asistente->update([
                'Nombre_Asistente'=>$request->Nombre,
                'ApellidoP_Asistente'=>$request->ApellidoP,
                'ApellidoM_Asistente'=>$request->ApellidoM,
                'AñoInicio_Asistente'=>$request->AnioI,
                'Cargo_Asistente'=>$request->Cargo,
                'Estado_Asistente'=>$request->Estado
            ]);
        }
        
        foreach ($request->addmore as $key => $value) {
            if($value!=null){
                Estudios_asistente::create([
                    'Nombre_EstudiosA'=>$value,
                    'Rut_Asistente'=>$request->Rut
                ]);
            }
        }
        
        return redirect()->route('admin.asistente.index')->with('info', 'la actualizacion fue exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($asistente)
    {
        $asistente=Asistente::where('Rut_Asistente', $asistente)->first();
        $url = str_replace('storage', 'public', $asistente->Imagen);
        Storage::delete($url);

        $asistente->delete();
        return redirect()->route('admin.asistente.index');
    }
}
