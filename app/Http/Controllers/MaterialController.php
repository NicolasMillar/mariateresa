<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function index(Asignatura $asignatura)
    {
        $unidad=DB::table('unidades')->where('ID_Asignatura', '=', $asignatura->id)->orderBy('Valor')->get();
        $materiales=DB::table('materiales')->whereIn('ID_Unidad', $unidad->pluck('id'))->get();
        return view('admin.materiales.index', compact('asignatura', 'unidad', 'materiales'));
    }
}
