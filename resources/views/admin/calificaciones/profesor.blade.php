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
@extends('layouts.userprofesor')
@section('Content')
    <div style="width: 100%; border: solid blue 1px">
        <div style="float:left">
            <button style="background-color:rgba(62, 62, 248, 0.664)" id="boton">Crear Evaluacion</button>
        </div>
        <div style="justify-content: center; ">
            <button style="background-color:cadetblue" id="boton">Ingresar calificacion</button>
        </div>
        <div style="float:left">
            <button style="background-color:darkolivegreen" id="boton">Modifica calificacion</button>
        </div>        
        
    </div>
    <div style=" justify-content: center; display:flex;" >
        <table class="tabla" style="width: 50%">
            <thead>
                <tr>
                    <th>Nombre Alumno</th>
                    <th>Nombre</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notas as $nota)
                    <tr>
                        <td>{{$nota->Rut}}</td>
                        @foreach ($notas as $nota1)
                            @if ($nota->Rut == $nota1->Rut)
                                <td>{{$nota1->Nombre_Prueba}}</td>
                                <td>{{$nota1->Notas}}</td>
                            @endif
                        @endforeach             
                    </tr>
                @endforeach
            </tbody>
                            
        </table>
    </div>
@endsection
<style>
    #boton{
        font-size: 24px; 
        border-radius: 4px;
    }   
</style>    