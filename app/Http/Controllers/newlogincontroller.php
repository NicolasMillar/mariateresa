<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Usuario_alumno;
use Session;

class newlogincontroller extends Controller
{
    public function login(){
        return view('login');
    }
    public function alumno(){
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "alummno"){
            return view('alumnohome');
        }else if($sessiontipo == "profesor"){
            return "algun dia";
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
            if(Hash::check($request->Contraseña, $consulta->Contraseña)){
                Session::put('rut', $consulta->Rut. "-".$consulta->DigitoV_Alumno);
                Session::put('nombre',$consulta->Nombre_Alumno. " ".$consulta->ApellidoP_Alumno);
                Session::put('sessiontipo','alummno');
                Session::put('fechaN',$consulta->FechaNacimiento_Alumno);
                Session::put('fechaI',$consulta->FechaIngreso_Alumno);
                Session::put('Imagen',$consulta->Imagen);
                return redirect()->route('alumnohome');
            }else{
                Session::flash('mensaje', "El Rut o la clave ingresada son incorrectos");
                return redirect()->route('login'); 
            }
        }else{
            return "algun dia";
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
