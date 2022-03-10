<?php
namespace App\Http\Controllers;
use App\Models\Prueba;
use App\Models\Profesor;
use App\Models\Asignatura;
use Session;


class calendarioController extends Controller{

    public function mostrarprofesor(){
        $sessionrut = session('rut');
        $asignaturas=Asignaturas::where('Rut_Profesor'==$sessionrut)->get();
        echo $asignaturas;
        $pruebas= Prueba::all();
        $cantidad=count($pruebas);
        for($i=0;$i<$cantidad;$i++){
            $title=$pruebas[$i]->Nombre_Prueba;
            $star=$pruebas[$i]->Fecha_Prueba;
            $nuevo = array(
                'id'=>$pruebas[$i]->id ,
                'title'=> $title,
                'start'=> $star
            );
            $mostrar[] = $nuevo;
        }
        return response()->json($mostrar);
    }

    public function mostraralumno(Prueba $p){
        $pruebas= Prueba::all();
        $cantidad=count($pruebas);
        for($i=0;$i<$cantidad;$i++){
            $title=$pruebas[$i]->Nombre_Prueba;
            $star=$pruebas[$i]->Fecha_Prueba;
            $nuevo = array(
                'id'=>$pruebas[$i]->id ,
                'title'=> $title,
                'start'=> $star
            );
            $mostrar[] = $nuevo;
        }
        return response()->json($mostrar);
    }

}