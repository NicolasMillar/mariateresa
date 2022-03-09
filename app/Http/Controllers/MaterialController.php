<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(Asignatura $asignatura)
    {
    
        return view('admin.materiales.index', compact('asignatura'));
    }
}
