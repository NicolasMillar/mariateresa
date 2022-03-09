<?php
namespace App\Http\Controllers;
use App\Models\Prueba;
use Session;

class calendarioController extends Controller{

    public function mostrarprofesor(Prueba $p){
        $pruebas= Prueba::all();
        $cantidad=count($pruebas);
        for($i=0;$i<$cantidad;$i++){
            $title="title: '".$pruebas[$i]->Nombre_Prueba."'";
            echo($title);
        }
    }

}