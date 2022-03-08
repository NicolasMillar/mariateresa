<?php

namespace App\Http\Controllers;
use App\Models\Asignatura;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function registrar(Asignatura $asignatura){
        echo($asignatura->id);
    }
}
