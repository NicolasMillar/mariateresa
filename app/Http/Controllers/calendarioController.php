<?php
namespace App\Http\Controllers;
use App\Models\Prueba;
use Session;

class calendarioController extends Controller{

    public function mostrarprofesor(Prueba $pruebas){
        $pruebas= $Prueba::all();
        print_r($pruebas);
    }

}