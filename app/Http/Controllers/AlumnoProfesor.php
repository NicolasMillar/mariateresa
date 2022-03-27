<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Usuario_alumno;
use App\Models\Usuario_profesor;
use Illuminate\Support\Facades\DB;
use App\Models\Calificacion;
use App\Models\Prueba;

use Session;

class AlumnoProfesor extends Controller
{
    public function login(){
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "alummno"){
            return redirect()->route('alumnohome');
        }else if($sessiontipo == "profesor"){
            return redirect()->route('profesorhome');
        }else{
            return view('login');
        }
    }
    public function alumno(){
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "alummno"){
            return view('alumnohome');
        }else if($sessiontipo == "profesor"){
            return redirect()->route('profesorhome'); 
        }else{
            return redirect()->route('login'); 
        }
    }

    public function profesor(){
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "alummno"){
            return redirect()->route('alumnohome'); 
        }else if($sessiontipo == "profesor"){
            return view('profesorhome'); 
        }else{
            return redirect()->route('login'); 
        }
    }
    public function calendario(){
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "profesor"){
            return view('calendarioprofesor'); 
        }if($sessiontipo == "alummno" ){
            return view('calendarioalumno');
        }else{
            return redirect()->route('login'); 
        }
    }
    public function validar(Request $request){
        $this->validate($request,[
            'Rut' => 'required',
            'Contraseña' => 'required',
            'Tipo_usuario' => 'required',
        ]);
        if($request->Tipo_usuario == 'ESTUDIANTE'){
            $consulta=Usuario_alumno::where('Rut',$request->Rut)->first();
            if(!is_null($consulta)){
                if(Hash::check($request->Contraseña, $consulta->Contraseña)){
                    $dbasignatura=DB::table('asignaturas')->select('asignaturas.id')->join('cursos', 'asignaturas.ID_Curso', '=', 'cursos.id')->join('participantes', 'cursos.id', '=', 'participantes.ID_Curso')->where('Estado_Curso', '=', 'active')->where('participantes.Rut', '=', $request->Rut)->get();
                    $asignaturas=Asignatura::whereIn('id', $dbasignatura->pluck('id'))->get();
                    Session::put('rut', $consulta->Rut);
                    Session::put('dv', $consulta->DigitoV_Alumno);
                    Session::put('nombre',$consulta->Nombre_Alumno. " ".$consulta->ApellidoP_Alumno);
                    Session::put('sessiontipo','alummno');
                    Session::put('fechaN',$consulta->FechaNacimiento_Alumno);
                    Session::put('fechaI',$consulta->FechaIngreso_Alumno);
                    Session::put('Imagen',$consulta->Imagen);
                    Session::put('asignaturas', $asignaturas->toArray());
                    return redirect()->route('alumnohome');
                }
                else{
                    Session::flash('mensaje', "la clave ingresada es incorrecta");
                    return redirect()->route('login'); 
                }
            }else{
                Session::flash('mensaje', "El Rut o el tipo de usuario ingresado es incorrecto");
                return redirect()->route('login'); 
            }
            
        }else if($request->Tipo_usuario == 'PROFESOR'){
            $consulta=Usuario_profesor::where('Rut',$request->Rut)->first();
            if(!is_null($consulta)){
                if(Hash::check($request->Contraseña, $consulta->Contraseña)){
                    $dbasignatura=DB::table('asignaturas')->select('asignaturas.id')->join('cursos', 'asignaturas.ID_Curso', '=', 'cursos.id')->where('Estado_Curso', '=', 'active')->where('asignaturas.Rut_Profesor', '=', $request->Rut)->get();
                    $asignaturas=Asignatura::whereIn('id', $dbasignatura->pluck('id'))->get();
                    Session::put('rut', $consulta->Rut);
                    Session::put('dv', $consulta->DigitoV_Profesor);
                    Session::put('nombre',$consulta->Nombre_Profesor." ".$consulta->ApellidoP_Profesor);
                    Session::put('sessiontipo','profesor');
                    Session::put('asignaturas', $asignaturas->toArray());
                    return redirect()->route('profesorhome');
                }else{
                    Session::flash('mensaje', "la clave ingresada es incorrecta");
                    return redirect()->route('login'); 
                }
            }else{
                Session::flash('mensaje', "El Rut o el tipo de usuario ingresado es incorrecto");
                return redirect()->route('login'); 
            }
            
        }
    }

    public function cerrarsession(){
        Session::forget('rut');
        Session::forget('sessiontipo');
        Session::forget('nombre');
        Session::forget('fechaN');
        Session::forget('fechaI');
        Session::forget('Imagen');
        Session::flush();
        return redirect()->route('home');
    }
}
