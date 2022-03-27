<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.admin.admin-add-home-slider-component');
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
            'Link'=>'required',
            'Image'=>'required|image'
        ]);
        $imagenes = $request->file('Image')->store('public/sliders');
        $Titulo=$request->Titulo;
        $Link=$request->Link;
        $Estado=true;
        $url = Storage::url($imagenes);
        HomeSlider::create([
            'Link'=>$Link,
            'Image'=>$url,
            'Estado'=>$Estado
        ]);
        return redirect()->route('admin.homeslider.create')->with('info', 'se creo un slider exitosamente');
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
    public function edit(HomeSlider $slider)
    {
        return view('livewire.admin.admin-edit-home-slider-component', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSlider $slider)
    {
        $request->validate([
            'Titulo'=>'required',
            'Image'=>'image',
            'Estado'=>'required'
        ]);
        if($request->hasFile('Image')){
            $urleliminada = str_replace('storage', 'public', $slider->Image);
            Storage::delete($urleliminada);
            $imagenes = $request->file('Image')->store('public/sliders');
            $url = Storage::url($imagenes);
            $slider->update([
                'Titulo'=>$request->Titulo,
                'Image'=>$url,
                'Estado'=>$request->Estado
            ]);
        }else{
            $slider->update([
                'Titulo'=>$request->Titulo,
                'Estado'=>$request->Estado
            ]);
        }
        
        return redirect()->route('admin.homeslider.index')->with('info', 'la actualizacion fue exitosa');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($homeslider)
    {
        $homeslider=HomeSlider::where('id', $homeslider)->first();
        $url = str_replace('storage', 'public', $homeslider->Image);
        Storage::delete($url);

        $homeslider->delete();
        return redirect()->route('admin.homeslider.index');
    }
}
