<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Material;

class MaterialController extends Controller
{
    public function index(Asignatura $asignatura)
    {
        $unidad=DB::table('unidades')->where('ID_Asignatura', '=', $asignatura->id)->orderBy('Valor')->get();
        $materiales=DB::table('materiales')->whereIn('ID_Unidad', $unidad->pluck('id'))->get();
        return view('admin.materiales.index', compact('asignatura', 'unidad', 'materiales'));
    }

    public function profesorMateriales(Request $request)
    {
        $asignatura=$request->asig;
        $materiales=DB::table('materiales')->where('ID_Asignatura', '=', $asignatura)->get();
        $count=	sizeof($materiales);
        return view('admin.materiales.profesormaterial', compact('asignatura', 'materiales', 'count'));
    }

    public function CrearMateriales(Request $request)
    {
        Material::create([
            'Nombre_Material'=>$request->Descripcion,
            'Link_Material'=>$request->link,
            'ID_Asignatura'=>$request->asignatura
        ]);
        return redirect()->route('profesorhome')->with('info', 'Se creo el nuevo material');
    }

    public function ActualizarMateriales(Request $request)
    {
        echo $request->Descripcion;
        //Material::where('id', $request->Material)->update(['Notas' => $nota]);
    }
}
