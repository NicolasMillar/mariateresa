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
    <div class="background">
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
    </div>
    
@endsection
<style>
    .background::before{  
        content: ' ';
        display: block;
        position: absolute;
        left: 52%;
        top: 40%;
        width: 30%;
        height: 30%;
        z-index: 1;
        opacity: 0.1;
        background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTI91X4Elct655bx7O8fLqIVOhQHDC5WyhHOhO2bk4y7tKkooC2FFkukO2n9I1qH2LkwQ&usqp=CAU");
        background-repeat: no-repeat;
    }
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