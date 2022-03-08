<?php

namespace App\Http\Controllers;
use App\Models\Asignatura;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function registrar(Asignatura $asignatura){
        $asignatura2 = Asignatura::where('id', '=', $asignatura->id)->get();
        if(is_null($asignatura2)){
            echo "no funciona";
        }else{
            echo "funciona";
        }
    }
}
