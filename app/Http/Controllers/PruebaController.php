<?php

namespace App\Http\Controllers;
use App\Models\Asignatura;
use App\Models\Prueba;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function registrar(Asignatura $asignatura, Request $request){
        $anio= \Carbon\Carbon::now();
        $year =date('Y', strtotime($anio));
        Prueba::create([
            'Nombre_Prueba'=>$request->Descripcion,
            'Fecha_Prueba'=>$request->FechaE,
            'Semestre'=>$request->semestre,
            'ID_Asignatura'=>$request->asignatura
        ]);
        return redirect()->route('profesorhome')->with('info', 'se creo la evaluacion');
    }
}
