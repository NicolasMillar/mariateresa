<?php

namespace App\Http\Controllers;

use App\Models\Psicologo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PsicologoController extends Controller
{
    public function index()
    {
        $psicologos = Psicologo::all();
        return view('admin.psicologos.index', compact('psicologos'));
    }
    public function create()
    {
        
        return view('admin.psicologos.create');
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'Rut'=>'required|digits_between:0,10|unique:usuario_alumnos',
            'DV'=>'required|regex:/^[kK0-9 ]+$/',
            'Nombre'=>'required|regex:/^[\pL\s\-]+$/u',
            'ApellidoP'=>'required|regex:/^[a-zA-Z]+$/u',
            'ApellidoM'=>'required|regex:/^[a-zA-Z]+$/u',
            'HoraI'=>"required|date_format:H:i",
            'HoraT'=>"required|date_format:H:i",
            'Especialidad'=>'required|regex:/^[\pL\s\-]+$/u',
            'Imagen'=>'required|image',
            'Telefono'=>'required|numeric'
        ]);
        $imagenes = $request->file('Imagen')->store('public/psicologos');
        $url = Storage::url($imagenes);
        Psicologo::create([
            'Rut'=>$request->Rut,
            'DigitoV_Psicologo'=>$request->DV,
            'Nombre_Psicologo'=>$request->Nombre,
            'ApellidoP_Psicologo'=>$request->ApellidoP,
            'ApellidoM_Psicologo'=>$request->ApellidoM,
            'Imagen'=>$url,
            'Hora_Inicio'=>$request->HoraI,
            'Hora_Termino'=>$request->HoraT,
            'Especialidad'=>$request->Especialidad,
            'Telefono_Contacto'=>$request->Telefono,
            
        ]);
        return redirect()->route('admin.psicologo.create')->with('info', 'se creo el/la psicologo exitosamente');
    }

    public function edit(Psicologo $psicologo)
    {
        return view('admin.psicologos.edit', compact('psicologo'));
    }

    public function update(Request $request, Psicologo $psicologo)
    {
        $request->validate([
            'HoraI'=>"required|date_format:H:i",
            'HoraT'=>"required|date_format:H:i",
            'Especialidad'=>'required|regex:/^[\pL\s\-]+$/u',
            'Imagen'=>'required|image',
            'Telefono'=>'required|numeric'
        ]);

        if($request->hasFile('Imagen')){
            $urleliminada = str_replace('storage', 'public', $psicologo->Imagen);
            Storage::delete($urleliminada);
            $imagenes = $request->file('Imagen')->store('public/psicologos');
            $url = Storage::url($imagenes);
            $psicologo->update([
                'Imagen'=>$url,
                'Hora_Inicio'=>$request->HoraI,
                'Hora_Termino'=>$request->HoraT,
                'Especialidad'=>$request->Especialidad,
                'Telefono_Contacto'=>$request->Telefono,
            ]);
        }else{
            $psicologo->update([
                'Hora_Inicio'=>$request->HoraI,
                'Hora_Termino'=>$request->HoraT,
                'Especialidad'=>$request->Especialidad,
                'Telefono_Contacto'=>$request->Telefono,
            ]);
        }
        return redirect()->route('admin.psicologo.index')->with('info', 'se actualizo el/la psicologo/a exitosamente');
    }
    public function destroy($psicologo)
    {
        $psicologo=Psicologo::where('Rut', $psicologo)->first();
        $url = str_replace('storage', 'public', $psicologo->Imagen);
        Storage::delete($url);

        $psicologo->delete();
        return redirect()->route('admin.psicologo.index');
    }
}
