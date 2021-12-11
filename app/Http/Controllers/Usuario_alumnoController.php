<?php

namespace App\Http\Controllers;

use App\Models\Usuario_alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Usuario_alumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Usuario_alumno::all();
        return view('admin.usuario_alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date= \Carbon\Carbon::now();
        return view('admin.usuario_alumnos.create', compact('date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anio= \Carbon\Carbon::now();
        $year =date('Y', strtotime($anio));
        $request->validate([
            'Rut'=>'required|digits_between:0,10|unique:usuario_alumnos',
            'DV'=>'required|regex:/^[kK0-9 ]+$/',
            'Nombre'=>'required|regex:/^[\pL\s\-]+$/u',
            'ApellidoP'=>'required|regex:/^[a-zA-Z]+$/u',
            'ApellidoM'=>'required|regex:/^[a-zA-Z]+$/u',
            'Direccion'=>'required|regex:/^[a-zA-Z0-9ñÑ\s]*$/u',
            'Comuna'=>'required|regex:/^[a-zA-ZñÑ\s]*$/u',
            'FechaI'=>"required|date",
            'FechaN'=>"required|date",
            'Password'=>['required','min:6','regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!"#$%&()*+,-.:;<=>?@_`{|}~]).*$/'],
            'Imagen'=>'required|image',
            'Estado'=>'required',
        ]);
        $imagenes = $request->file('Imagen')->store('public/auxiliares');
        $url = Storage::url($imagenes);
        $Estado=$request->Estado==1 ? 'active':'inactive';
        Usuario_alumno::create([
            'Rut'=>$request->Rut,
            'DigitoV_Alumno'=>$request->DV,
            'Nombre_Alumno'=>$request->Nombre,
            'ApellidoP_Alumno'=>$request->ApellidoP,
            'ApellidoM_Alumno'=>$request->ApellidoM,
            'Direccion_Alumno'=>$request->Direccion,
            'Comuna_Alumno'=>$request->Comuna,
            'FechaNacimiento_Alumno'=>$request->FechaN,
            'Contraseña'=>$request->Password,
            'FechaIngreso_Alumno'=>$request->FechaI,
            'Imagen'=>$url,
            'Estado_Alumno'=>$Estado
            
        ]);
        return redirect()->route('admin.usuario_alumno.create')->with('info', 'se creo el/la auxiliar exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario_alumno $alumno)
    {
        $date= \Carbon\Carbon::now();
        return view('admin.usuario_alumnos.edit', compact('alumno', 'date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario_alumno $alumno)
    {
        $request->validate([
            'Direccion'=>'required|regex:/^[a-zA-Z0-9ñÑ\s]*$/u',
            'Comuna'=>'required|regex:/^[a-zA-ZñÑ\s]*$/u',
            'Password'=>['nullable','min:6','regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!"#$%&()*+,-.:;<=>?@_`{|}~]).*$/'],
            'Imagen'=>'image',
        ]);
        $Password=$request->Password;
        if($Password==null){
            $Password=$alumno->Contraseña_Alumno;
        };
        
        $Estado=$request->Estado==1 ? 'active':'inactive';
        if($request->hasFile('Imagen')){
            $urleliminada = str_replace('storage', 'public', $alumno->Imagen);
            Storage::delete($urleliminada);
            $imagenes = $request->file('Imagen')->store('public/usuario_alumno');
            $url = Storage::url($imagenes);
            $alumno->update([
                
                'Direccion_Alumno'=>$request->Direccion,
                'Comuna_Alumno'=>$request->Comuna,
                'Imagen'=>$url,
                'Contraseña'=>$Password,
                'Estado_Alumno'=>$Estado
            ]);
        }else{
            $alumno->update([
                'Direccion_Alumno'=>$request->Direccion,
                'Comuna_Alumno'=>$request->Comuna,
                'Contraseña'=>$Password,
                'Estado_Alumno'=>$Estado
            ]);
        }
        return redirect()->route('admin.usuario_alumno.index')->with('info', 'se actualizo el/la alumno/a exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($alumno)
    {
        $alumno=Usuario_alumno::where('Rut', $alumno)->first();
        $url = str_replace('storage', 'public', $alumno->Imagen);
        Storage::delete($url);

        $alumno->delete();
        return redirect()->route('admin.usuario_alumno.index');
    }
}
