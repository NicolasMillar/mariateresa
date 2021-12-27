<?php 
    use App\Models\Asignatura;
    $sessionusuario = session('nombre');
    $sessiontipo = session('sessiontipo');
    $sessionrut = session('rut');
    $sessionfechan = session('fechaN');
    $sessionfechai = session('fechaI');
    $sessionFoto = session('Imagen');
    $sessionasignatura = Asignatura::hydrate(Session::get('asignaturas'));
    $sessionasignatura = collect($sessionasignatura);
?>

@extends('layouts.user')
@section('Content')
    <div class="foto" > 
        <img src="{{asset($sessionFoto)}}" width="175" height="175" style="border-radius: 50%">
    </div>
    <div style="justify-content: center; display: flex;  margin-top:2%">
        <div class= "datos" > 
            <h1>Rut: {{$sessionrut}}</h1>
            <h1>Nombre: {{$sessionusuario}}</h1>
            <h1>Fecha de nacimiento: {{$sessionfechan}}</h1>
            <h1>Año de ingreso: {{$sessionfechai}}</h1>
        </div>
    </div>
@endsection
<style>
    .datos{
        width:30%;
        text-align:left;
        border: 2px outset rgb(123, 24, 204);
        border-radius: 10px;
    }
    .datos h1{
        margin-left:5px;
    }
</style>