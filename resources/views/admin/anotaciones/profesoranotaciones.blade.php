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
    <div style=" justify-content: center; display:flex;" >
        <table class="tabla" style="width: 50%">
            <thead>
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{$alumno->Rut}}</td>
                        <td>{{$alumno->Nombre_Alumno}} {{$alumno->ApellidoP_Alumno}}</td>
                    </tr>
                @endforeach
            </tbody>
                            
        </table>
    </div>
@endsection
<style></style>   