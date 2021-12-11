<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('admin.noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.noticias.create');
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
            'Titulo'=>'required',
            'Link'=>'required',
            'Imagen'=>'required|image',
            'Estado'=>'required',
            'Descripcion'=>'required'
        ]);
        $imagenes = $request->file('Imagen')->store('public/news');
        $Titulo=$request->Titulo;
        $Link=$request->Link;
        $Estado=$request->Estado;
        $Descripcion=$request->Descripcion;
        $url = Storage::url($imagenes);
        Noticia::create([
            'Titulo'=>$Titulo,
            'Link'=>$Link,
            'Imagen'=>$url,
            'Estado'=>$Estado,
            'Descripcion'=>$Descripcion
        ]);
        return redirect()->route('admin.noticia.create')->with('info', 'se creo la noticia exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        return view('admin.noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        $request->validate([
            'Titulo'=>'required',
            'Imagen'=>'image',
            'Estado'=>'required',
            'Descripcion'=>'required'
        ]);
        $Estado=$request->Estado==1 ? 'active':'inactive';
        if($request->hasFile('Imagen')){
            $urleliminada = str_replace('storage', 'public', $noticia->Imagen);
            Storage::delete($urleliminada);
            $imagenes = $request->file('Imagen')->store('public/news');
            $url = Storage::url($imagenes);
            $noticia->update([
                'Titulo'=>$request->Titulo,
                'Imagen'=>$url,
                'Estado'=>$Estado,
                'Descripcion'=>$request->Descripcion
            ]);
        }else{
            $noticia->update([
                'Titulo'=>$request->Titulo,
                'Estado'=>$Estado,
                'Descripcion'=>$request->Descripcion
            ]);
        }
        
        return redirect()->route('admin.noticia.index')->with('info', 'la actualizacion fue exitosa');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($noticia)
    {
        $noticia=Noticia::where('id', $noticia)->first();
        $url = str_replace('storage', 'public', $noticia->Imagen);
        Storage::delete($url);

        $noticia->delete();
        return redirect()->route('admin.noticia.index');
    }
}
