<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::all();
        return view('admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventos.create');
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
            'inicio'=>'required|date|after:yesterday',
            'horainicio'=>'required',
            'termino'=>'required|date|after:yesterday',
            'horatermino'=>'required'

        ]);
        $Titulo=$request->Titulo;
        $date1=$request->inicio;
        $time1=$request->horainicio;
        $date2=$request->termino;
        $time2=$request->horatermino;
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date1 $time1"));
        $combinedDT2 = date('Y-m-d H:i:s', strtotime("$date2 $time2"));
        if($combinedDT2 < $combinedDT){
            return redirect()->route('admin.evento.create')->with('danger', 'La fecha no es correcta no se creo el registro');
        }
        Evento::create([
            'Titulo'=>$Titulo,
            'FechaInicio_Evento'=>$combinedDT,
            'FechaTermino_Evento'=>$combinedDT2
        ]);
        return redirect()->route('admin.evento.create')->with('info', 'se creo un evento exitosamente');
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
    public function edit(Evento $evento)
    {
        return view('admin.eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'Titulo'=>'required',
            'inicio'=>'required|date|after:yesterday',
            'horainicio'=>'required',
            'termino'=>'required|date|after:yesterday',
            'horatermino'=>'required'

        ]);
        $Titulo=$request->Titulo;
        $date1=$request->inicio;
        $time1=$request->horainicio;
        $date2=$request->termino;
        $time2=$request->horatermino;
        $combinedDT = date('Y-m-d H:i:s', strtotime("$date1 $time1"));
        $combinedDT2 = date('Y-m-d H:i:s', strtotime("$date2 $time2"));
        if($combinedDT2 < $combinedDT){
            return redirect()->route('admin.evento.index')->with('danger', 'La fecha no es correcta no se actualizo el registro');
        }
        $evento->update([
            'Titulo'=>$Titulo,
            'FechaInicio_Evento'=>$combinedDT,
            'FechaTermino_Evento'=>$combinedDT2
        ]);
        return redirect()->route('admin.evento.index')->with('info', 'se actualizo un evento exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($evento)
    {
        $evento=Evento::where('id', $evento)->first();

        $evento->delete();
        return redirect()->route('admin.evento.index');
    }
}
