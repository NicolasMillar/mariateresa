<?php
namespace App\Http\Controllers;
use App\Models\Prueba;
use App\Models\Profesor;
use App\Models\Asignatura;
use Session;


class calendarioController extends Controller{

    public function mostrarprofesor(){
        $sessionasignatura = Asignatura::hydrate(Session::get('asignaturas'));
        $sessionasignatura = collect($sessionasignatura);
        foreach($sessionasignatura as $key => $asignaturas){
            $id =$asignaturas['id'];
            $ids[] =$id;
        }
        $pruebas= Prueba::whereIn('ID_Asignatura', $ids)->get();
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

    public function mostraralumno(){
        $sessionasignatura = Asignatura::hydrate(Session::get('asignaturas'));
        $sessionasignatura = collect($sessionasignatura);
        foreach($sessionasignatura as $key => $asignaturas){
            $id =$asignaturas['id'];
            $ids[] =$id;
        }
        $pruebas= Prueba::whereIn('ID_Asignatura', $ids)->get();
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