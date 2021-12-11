<?php

namespace App\Http\Controllers;

use App\Models\Auxiliar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuxiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auxiliares = Auxiliar::all();
        return view('admin.auxiliares.index', compact('auxiliares'));
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
        return view('admin.auxiliares.create', compact('year'));
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
        $imagenes = $request->file('Imagen')->store('public/auxiliares');
        $url = Storage::url($imagenes);
        $Estado=$request->Estado==1 ? 'active':'inactive';
        Auxiliar::create([
            'Rut_Auxiliar'=>$request->Rut,
            'DigitoV_Auxiliar'=>$request->DV,
            'Nombre_Auxiliar'=>$request->Nombre,
            'ApellidoP_Auxiliar'=>$request->ApellidoP,
            'ApellidoM_Auxiliar'=>$request->ApellidoM,
            'AñoInicio_Auxiliar'=>$request->AnioI,
            'Cargo_Auxiliar'=>$request->Cargo,
            'Imagen'=>$url,
            'Estado_Auxiliar'=>$Estado
        ]);
        return redirect()->route('admin.auxiliar.create')->with('info', 'se creo el/la auxiliar exitosamente');
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
    public function edit(Auxiliar $auxiliare)
    {
        $anio= \Carbon\Carbon::now();
        $year =date('Y', strtotime($anio));
        return view('admin.auxiliares.edit', compact('auxiliare', 'year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auxiliar $auxiliare)
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
            $urleliminada = str_replace('storage', 'public', $auxiliare->Imagen);
            Storage::delete($urleliminada);
            $imagenes = $request->file('Imagen')->store('public/auxiliares');
            $url = Storage::url($imagenes);
            $auxiliare->update([
                'Nombre_Auxiliar'=>$request->Nombre,
                'ApellidoP_Auxiliar'=>$request->ApellidoP,
                'ApellidoM_Auxiliar'=>$request->ApellidoM,
                'AñoInicio_Auxiliar'=>$request->AnioI,
                'Cargo_Auxiliar'=>$request->Cargo,
                'Imagen'=>$url,
                'Estado_Auxiliar'=>$request->Estado
            ]);
        }else{
            $auxiliare->update([
                'Nombre_Auxiliar'=>$request->Nombre,
                'ApellidoP_Auxiliar'=>$request->ApellidoP,
                'ApellidoM_Auxiliar'=>$request->ApellidoM,
                'AñoInicio_Auxiliar'=>$request->AnioI,
                'Cargo_Auxiliar'=>$request->Cargo,
                'Estado_Auxiliar'=>$request->Estado
            ]);
        }
        return redirect()->route('admin.auxiliar.index')->with('info', 'la actualizacion fue exitosa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($auxiliar)
    {
        $auxiliar=Auxiliar::where('Rut_Auxiliar', $auxiliar)->first();
        $url = str_replace('storage', 'public', $auxiliar->Imagen);
        Storage::delete($url);

        $auxiliar->delete();
        return redirect()->route('admin.auxiliar.index');
    }
}
