<?php
namespace App\Http\Controllers;
use App\Models\Prueba;
use Session;

class calendarioController extends Controller{

    public function mostrarprofesor(Prueba $prueba){
        $prueba= $Prueba::all();
        return response()->json($prueba);
    }

}