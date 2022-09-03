<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Calificacion;
use App\Models\Prueba;
use App\Models\Participante;
use App\Models\Usuario_alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalificacionController extends Controller
{
    public function index(Asignatura $asignatura, Usuario_alumno $alumno)
    {
        $pruebas = Prueba::where('ID_Asignatura', '=', $asignatura->id)->get();
        $notas = DB::table('calificaciones')->join('pruebas', 'pruebas.id', '=', 'calificaciones.ID_Pruebas')->where('Rut', '=', $alumno->Rut)->whereIn('ID_Pruebas', $pruebas->pluck('id'))->get();
        return view('admin.calificaciones.index', compact('notas'));
    }
    public function profesor(Asignatura $asignatura)
    {
        $pruebas = Prueba::where('ID_Asignatura', '=', $asignatura->id)->get();
        $notas = DB::table('calificaciones')->join('pruebas', 'pruebas.id', '=', 'calificaciones.ID_Pruebas')->whereIn('ID_Pruebas', $pruebas->pluck('id'))->get();
        $participantes = Participante::where('ID_Curso', '=', $asignatura->ID_Curso)->get();
        $cualquiera=$asignatura;
        $cont=count($pruebas);
        $limite=count($notas);
        $anterior=0; 
        $promedios=[];
        $id=0;
        for($i=0;$i<$limite;$i++){
            if($anterior != $notas[$i]->ID_Pruebas){
                $anterior=$notas[$i]->ID_Pruebas;
                $nota = DB::table('Calificaciones')->where('ID_Pruebas', '=', $anterior)->get();
                $total=count($nota);
                $promedio=0;
                for($j=0;$j<$total;$j++){
                    $promedio=$promedio+$nota[$j]->Notas;
                }
                $promedio =$promedio/$total;
                $promedios [] = $promedio;
            }
        }
        foreach ($pruebas as $key => $value) {
            $id=$value->id;
        }
        return view('admin.calificaciones.profesor', compact('participantes','cont','notas','cualquiera','promedios', 'id'));
    }

    public function Notasalumno(Request $request)
    { 
        $pruebas = Prueba::where('ID_Asignatura', '=', $request->Asignatura)->get();
        $asignatura=$request->Asignatura;
        $cont=count($pruebas);
        $notas = DB::table('calificaciones')->join('pruebas', 'pruebas.id', '=', 'calificaciones.ID_Pruebas')->whereIn('ID_Pruebas', $pruebas->pluck('id'))->where('Rut', '=', $request->Alumnor)->get();
        $anterior=0;
        $notas2 = DB::table('calificaciones')->join('pruebas', 'pruebas.id', '=', 'calificaciones.ID_Pruebas')->whereIn('ID_Pruebas', $pruebas->pluck('id'))->get();
        $limite=count($notas2);
        $promedios=[]; 
        for($i=0;$i<$limite;$i++){
            if($anterior != $notas2[$i]->ID_Pruebas){
                $anterior=$notas2[$i]->ID_Pruebas;
                $nota = DB::table('Calificaciones')->where('ID_Pruebas', '=', $anterior)->get();
                $total=count($nota);
                $promedio=0;
                for($j=0;$j<$total;$j++){
                    $promedio=$promedio+$nota[$j]->Notas;
                }
                $promedio =$promedio/$total;
                $promedios [] = $promedio;
            }
        }
        return view('admin.calificaciones.alumnonotas' , compact('notas', 'cont', 'asignatura', 'promedios', 'total')); 
    }
    
    public function ActualizarNotasa(Request $request){
        $pruebas= Prueba::where('ID_Asignatura', '=', $request->asignatura)->get();
        for($i=0; $i<$request->total;$i++){
            $idprueba=$pruebas[$i]->id;
            $iden=$i+2;
            $nota=$request->$iden;
            Calificacion::where('Rut', $request->alumno)->where('ID_Pruebas',$idprueba)->update(['Notas' => $nota]);
        }
        return redirect()->route('profesorhome')->with('info', 'Se modificaron las calificaciones');
    }

    public function Notasup(Request $request){
        for($i=0; $i<$request->total; $i++){
            $label="N".$i;
            $Nota= $request->$label;
            $Rut= $request->$i;
            $identificador= $request->identificador;
            Calificacion::create([
                'Rut'=>$Rut,
                'ID_Pruebas'=>$identificador,
                'Notas'=>$Nota
            ]);
        }
        return redirect()->route('profesorhome')->with('info', 'Se ingresaron las calificacion');
    }
}
