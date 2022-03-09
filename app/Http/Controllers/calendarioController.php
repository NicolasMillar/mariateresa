<?php
namespace App\Http\Controllers;
use App\Models\Prueba;
use Session;

class calendarioController extends Controller{

    public function mostrarprofesor(Prueba $p){
        echo("pase por aca");
        $pruebas= Prueba::all();
        $cantidad=count($pruebas);
        for($i=0;$i<$cantidad;$i++){
            $title="title: '".$pruebas[$i]->Nombre_Prueba."'";
            $star="start: '".$pruebas[$i]->Fecha_Prueba."'";
        }
        $prue=$title.", ".$star;
        return response()->json_encode([
            'title' => 'Lorem Ipsum',
            'start' =>  '2022-03-14',
            'end' =>  '2022-03-14',
        ]);
    }

}