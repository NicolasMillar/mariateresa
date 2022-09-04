<?php

namespace App\Http\Controllers;

use App\Models\Titulo_profesor;
use App\Models\Usuario_profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Session;


class Usuario_profesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($sessiontipo == "alummno"){
            $pusuarios = Usuario_profesor::all();
            return view('admin.usuario_profesores.index', compact('pusuarios'));
        }
        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date= \Carbon\Carbon::now();
        return view('admin.usuario_profesores.create', compact('date'));
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
            'Rut'=>'required|between:1,10',
            'DV'=>'required|regex:/^[kK0-9 ]+$/',
            'Nombre'=>'required|regex:/^[\pL\s\-]+$/u',
            'ApellidoP'=>'required|regex:/^[a-zA-Z]+$/u',
            'ApellidoM'=>'required|regex:/^[a-zA-Z]+$/u',
            'FechaI'=>'required',
            'Password'=>['required','min:6','regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!"#$%&()*+,-.:;<=>?@_`{|}~]).*$/'],
            'Imagen'=>'required|image',
            'addmore.*' => 'required',
        ]);
        $imagenes = $request->file('Imagen')->store('public/usuario_profesor');
        $url = Storage::url($imagenes);
        $password=Hash::make($request->Password);
        $Estado=$request->Estado==1 ? 'active':'inactive';
        Usuario_profesor::create([
            'Rut'=>$request->Rut,
            'DigitoV_Profesor'=>$request->DV,
            'Nombre_Profesor'=>$request->Nombre,
            'ApellidoP_Profesor'=>$request->ApellidoP,
            'ApellidoM_Profesor'=>$request->ApellidoM,
            'Contraseña'=>$password,
            'FechaInicio_Profesor'=>$request->FechaI,
            'Imagen'=>$url,
            'Estado_Profesor'=>$Estado
        ]);
        foreach ($request->addmore as $key => $value) {

            Titulo_profesor::create([
                'Nombre_Titulo'=>$value,
                'Rut_Profesor'=>$request->Rut
            ]);

        }
        return redirect()->route('admin.usuario_profesor.create')->with('info', 'se creo el/la profesor/a exitosamente');
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
    public function edit(Usuario_profesor $pusuario)
    {
        $date= \Carbon\Carbon::now();
        return view('admin.usuario_profesores.edit', compact('pusuario', 'date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario_profesor $pusuario)
    {
        $anio= \Carbon\Carbon::now();
        
        $request->validate([
            'Nombre'=>'required|regex:/^[\pL\s\-]+$/u',
            'FechaI'=>'required',
            'Password'=>['nullable','min:6','regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!"#$%&()*+,-.:;<=>?@_`{|}~]).*$/'],
            'Imagen'=>'image',
            'Estado'=>'required'
        ]);
        $Password=Hash::make($request->Password);
        if($Password==null){
            $Password=$pusuario->Contraseña;
        };
        
        $Estado=$request->Estado==1 ? 'active':'inactive';
        if($request->hasFile('Imagen')){
            $urleliminada = str_replace('storage', 'public', $pusuario->Imagen);
            Storage::delete($urleliminada);
            $imagenes = $request->file('Imagen')->store('public/usuario_profesor');
            $url = Storage::url($imagenes);
            $pusuario->update([
                
                'Nombre_Profesor'=>$request->Nombre,
                'Contraseña'=>$Password,
                'FechaInicio_Profesor'=>$request->FechaI,
                'Imagen'=>$url,
                'Estado_Profesor'=>$Estado
            ]);
        }else{
            $pusuario->update([
                'Nombre_Profesor'=>$request->Nombre,
                'Contraseña'=>$Password,
                'FechaInicio_Profesor'=>$request->FechaI,
                'Estado_Profesor'=>$Estado
            ]);
        }
        foreach ($request->addmore as $key => $value) {
            if($value!=null){
                Titulo_profesor::create([
                    'Nombre_Titulo'=>$value,
                    'Rut_Profesor'=>$pusuario->Rut
                ]);
    
            }
            
        }
        return redirect()->route('admin.usuario_profesor.index')->with('info', 'se actualizo el/la profesor/a exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pusuario)
    {
        $pusuario=Usuario_profesor::where('Rut', $pusuario)->first();
        $url = str_replace('storage', 'public', $pusuario->Imagen);
        Storage::delete($url);

        $pusuario->delete();
        return redirect()->route('admin.usuario_profesor.index');
    }

    public function cuenta(){
        return view('cuenta');
    }

    public function cambiarcontraseña(Request $request){
        $request->validate([
            'ContraseñaActual'=>['required','min:6','regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!"#$%&()*+,-.:;<=>?@_`{|}~]).*$/'],
            'contraseñanueva'=>['required','min:6','regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!"#$%&()*+,-.:;<=>?@_`{|}~]).*$/'],
            'confcontraseña'=>['required','min:6','regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!"#$%&()*+,-.:;<=>?@_`{|}~]).*$/'],
        ]);
        $sessionrut = session('rut');
        $consulta=Usuario_profesor::where('Rut',$sessionrut)->first();
        if(!is_null($consulta)){
            if(Hash::check($request->ContraseñaActual, $consulta->Contraseña)){
                if(strcmp($request->contraseñanueva, $request->confcontraseña) == 0){
                    $password=Hash::make($request->contraseñanueva);
                    $consulta->update([
                        'Contraseña'=> $password
                    ]);
                    return redirect()->route('cuenta')->with('info', 'se actualizo  ela contraseña exitosamente');
                }else{
                    return redirect()->route('cuenta')->with('warning', 'Las contraseñas nuevas no coinciden');
                }
            }else{
                return redirect()->route('cuenta')->with('warning', 'Las contraseñas ingresada no coincide con su contraseña actual');
            }
        }
    }
}
