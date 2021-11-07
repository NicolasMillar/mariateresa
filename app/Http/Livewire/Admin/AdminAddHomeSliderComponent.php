<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $titulo;
    public $link;
    public $imagen;
    public $estado;

    public function mount(){
        $this->estado = 0;
    }

    public function Añadir(){
        $slider = new HomeSlider();
        $slider->titulo = $this->titulo;
        $slider->link = $this->link;
        $imagename = Carbon::now()->timestamp. '.' . $this->imagen->extension();
        $this->imagen->storeAs('sliders', $imagename);
        $slider->imagen = $imagename;
        $slider->estado = $this->estado;
        $slider->save();
        session()->flash('message', 'la imagen se guardo correctamente');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component');
    }
}
