<?php 
    use App\Models\Asignatura;
    $sessionrut = session('rut');
    $sessionusuario = session('nombre');
    $sessiontipo = session('sessiontipo');
    $sessionasignatura = Asignatura::hydrate(Session::get('asignaturas'));
    $sessionasignatura = collect($sessionasignatura);
?>
@extends('layouts.userprofesor')
@section('Content')
    <div class="background">
        <div class="foto" > 
            <img src="">
        </div>
        <div style="justify-content: center; display: flex;  margin-top:2%">
            <div class= "datos" > 
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