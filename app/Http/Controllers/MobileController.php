<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\FCMToken;
use App\Models\Prueba;
use App\Models\Usuario_alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MobileController extends Controller
{
    //

    public function login(Request $request){

        $this->validate($request,[
            'Rut' => 'required',
            'Contraseña' => 'required',
            'Token'=>'required'
        ]);

        $consulta=Usuario_alumno::where('Rut',$request->Rut)->first();
        $consultatoken=FCMToken::where('token', $request->Token)->first();
            if(Hash::check($request->Contraseña, $consulta->Contraseña)){
                if(is_null($consultatoken)){
                    FCMToken::create([
                        'Rut'=>$request->Rut,
                        'token'=>$request->Token
                    ]);
                }
                
                $token=md5(time()). '.' .md5($request->Rut);
                return response()->json([
                    'token'=>$token
                ]);
            }else{
                return response()->json([
                    'message'=>'La Combinacion de RUT y Contraseña no existe'
                ], 401);
            }
        
    }

    public function usuario_movil(Request $request){
        
        $rut=$request->Rut;
        $dbasignatura=DB::table('asignaturas')->select('asignaturas.id')->join('cursos', 'asignaturas.ID_Curso', '=', 'cursos.id')->join('participantes', 'cursos.id', '=', 'participantes.ID_Curso')->where('Estado_Curso', '=', 'active')->where('participantes.Rut', '=', $rut)->get();
        $asignaturas=Asignatura::whereIn('id', $dbasignatura->pluck('id'))->get();
        return response()->json([
            'Asignaturas'=>$asignaturas
        ]);
    }
    public function anotaciones(Request $request){
        $anio= \Carbon\Carbon::now();
        $year =date('Y', strtotime($anio));
        $anotaciones = DB::table('anotaciones')->join('asignaturas', 'asignaturas.id', '=', 'anotaciones.ID_Asignatura')->join('cursos', 'cursos.id', '=', 'asignaturas.ID_Curso')->where('Rut', '=', $request->Rut)->where('cursos.Anio_Academico', '=', $year)->get();
        return response()->json([
            'Anotaciones'=>$anotaciones
        ]);
    }
    public function notas(Request $request){
        $id=$request->ID;
        $rut=$request->Rut;
        $pruebas = Prueba::where('ID_Asignatura', '=', $id)->get();
        $notas = DB::table('calificaciones')->join('pruebas', 'pruebas.id', '=', 'calificaciones.ID_Pruebas')->where('Rut', '=', $rut)->whereIn('ID_Pruebas', $pruebas->pluck('id'))->get();
        return response()->json([
            'Calificaciones'=>$notas
        ]);
    }
    public function fechas(Request $request){
        $rut=$request->Rut;
        $fecha= \Carbon\Carbon::now();
        $pruebas=DB::table('pruebas')->join('asignaturas', 'asignaturas.id', '=', 'pruebas.ID_Asignatura')->join('cursos', 'cursos.id', '=', 'asignaturas.ID_Curso')->join('participantes', 'participantes.ID_Curso', '=', 'cursos.id')->where('participantes.Rut', '=', $rut)->where('Fecha_Prueba', '>', $fecha)->get();
        return response()->json([
            'Fechas'=>$pruebas
        ]);
    }
    public function logout(Request $request){
        $token=$request->Token;
        $eliminar=FCMToken::where('token', $token)->first();
        $eliminar->delete();
        return response()->json([
            'estado'=>$token
        ]);
    } 
}
