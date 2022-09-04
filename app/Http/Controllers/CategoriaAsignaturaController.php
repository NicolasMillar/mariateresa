<?php

namespace App\Http\Controllers;

use App\Models\Categoria_Asignatura;
use Illuminate\Http\Request;

class CategoriaAsignaturaController extends Controller
{
    public function index()
    {
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "admin"){
            $categorias = Categoria_Asignatura::all();
            return view('admin.categoria_asignaturas.index', compact('categorias'));
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
        $sessiontipo = session('sessiontipo');
        if($sessiontipo == "admin"){
            return view('admin.categoria_asignaturas.create');
        }
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre'=>'required|required|regex:/^[\pL\s\-]+$/u',
            'Minimo'=>'required|numeric|min:0|max:9',
            'Maximo'=>'required|numeric|min:0|max:9'
        ]);
       
        Categoria_Asignatura::create([
            'Nombre_Categoria'=>$request->Nombre,
            'Minimo_Grado'=>$request->Minimo,
            'Maximo_Grado'=>$request->Maximo,
            
        ]);
        return redirect()->route('admin.categoria_asignatura.create')->with('info', 'se creo la categoria exitosamente');
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
    public function edit(Categoria_Asignatura $categoria)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria_Asignatura $categoria)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria)
    {
        $categoria=Categoria_Asignatura::where('id', $categoria)->first();

        $categoria->delete();
        return redirect()->route('admin.categoria_asignatura.index');
    }
}
