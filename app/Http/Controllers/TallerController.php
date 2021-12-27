<?php

namespace App\Http\Controllers;

use App\Models\Taller;
use App\Models\Usuario_profesor;
use Illuminate\Http\Request;

class TallerController extends Controller
{
    public function index()
    {
        $talleres = Taller::all();
        return view('admin.talleres.index', compact('talleres'));
        
    }
    public function create()
    {
        $profesor=Usuario_profesor::all();
        return view('admin.talleres.create', compact('profesor'));
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'Nombre'=>'required|regex:/^[a-zA-Z]+$/u',
            'Profesor'=>'digits_between:0,10',
        ]);
        
        Taller::create([
            'Nombre_Taller'=>$request->Nombre,
            'Rut_Profesor'=>$request->Profesor
        ]);
        return redirect()->route('admin.taller.create')->with('info', 'se creo el taller exitosamente');
    }
    public function edit(Taller $tallere)
    {
        return view('admin.talleres.edit', compact('tallere'));
    }
    public function update(Request $request, Taller $tallere)
    {
        $request->validate([
            'Profesor'=>'digits_between:0,10',
        ]);
        $tallere->update([
            'Rut_Profesor'=>$request->Profesor
        ]);
        return redirect()->route('admin.taller.index')->with('info', 'la actualizacion fue exitosa');
    }
    public function destroy($tallere)
    {
        $tallere=Taller::where('id', $tallere)->first();
        $tallere->delete();
        return redirect()->route('admin.taller.index');
    }
}
