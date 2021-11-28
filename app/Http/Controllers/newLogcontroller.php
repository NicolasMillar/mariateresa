<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Redirect;


use Illuminate\Http\Request;

class newLogcontroller extends Controller
{   protected $guard='alumno';
    public function index(){
        return view('alumnohome');
    }
    public function entrar(){
        return view('login');
    }
    public function login(Request $request){
        $Tusuario = $request->only('Tipo_usuario');
        $rut=$request->only('Rut');
        $password=$request->only('Contraseña');
        if($Tusuario['Tipo_usuario'] == "ESTUDIANTE"){
            $user=User::where('Rut', $rut['Rut'])->first();
            if($user->Contraseña===$password['Contraseña']){
                Auth::login($user);
                $request->session()->regenerate();
                return view('alumnohome');
            }else{
                return "no funciono";
            }
            
        }else{
            return "Estamos trabajando para usted";
        }
    }
}
