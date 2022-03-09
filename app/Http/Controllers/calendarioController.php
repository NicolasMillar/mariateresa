<?php
namespace App\Http\Controllers;
use App\Models\Prueba;
use Session;

class calendarioController extends Controller{

    public function mostrarprofesor(Prueba $p){
        $pruebas= Prueba::all();
        $cantidad=count($pruebas);
        for($i=0;$i<$cantidad;$i++){
            return response()->json($pruebas);
            /*
            $title="title: '".$pruebas[$i]->Nombre_Prueba."'";
            echo($title);
            $date="start: '"..$pruebas[$i]->Nombre_Prueba."'";*/
        }
    }

}