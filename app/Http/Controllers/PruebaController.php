<?php

namespace App\Http\Controllers;
use App\Models\Asignatura;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function registrar(Asignatura $asignatura, Request $request){
        $anio= \Carbon\Carbon::now();
        $year =date('Y', strtotime($anio));
        $asignatura2 = Asignatura::where('id', '=', $asignatura->id)->get();
        
    }
}
