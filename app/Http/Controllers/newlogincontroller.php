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
            $password=Hash::make($request->Contraseña);
            $consulta=Usuario_alumno::where('Rut',$request->Rut)->get();
            $cuantos=count($consulta);
            if($cuantos == 1 and Hash::check($request->Contraseña, $consulta[0]->Contraseña)){
                Session::put('rut', $consulta[0]->Rut. "-".$consulta[0]->DigitoV_Alumno);
                Session::put('nombre',$consulta[0]->Nombre_Alumno. " ".$consulta[0]->ApellidoP_Alumno);
                Session::put('sessiontipo','alummno');
                Session::put('fechaN',$consulta[0]->FechaNacimiento_Alumno);
                Session::put('fechaI',$consulta[0]->FechaIngreso_Alumno);
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
        Session::forget('session');
        Session::forget('sessiontipo');
        Session::flush();
        return redirect()->route('home');
    }
}
