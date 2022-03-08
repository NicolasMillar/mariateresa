<?php

namespace App\Http\Controllers;

use App\Models\Usuario_alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MobileController extends Controller
{
    //

    public function login(Request $request){

        $this->validate($request,[
            'Rut' => 'required',
            'Contraseña' => 'required'
        ]);

        $consulta=Usuario_alumno::where('Rut',$request->Rut)->first();
            if(Hash::check($request->Contraseña, $consulta->Contraseña)){
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

    }
}
