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
                        {!! Form::open(['route'=>['anotacionesAlumno']] )!!}
                        <input type="hidden" name="Rut" id="Rut" value="{{$alumno->Rut}}">
                        <td>{!! Form::submit("$alumno->Nombre_Alumno $alumno->ApellidoP_Alumno") !!}</td>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
            </tbody>
                            
        </table>
    </div>
@endsection
<style></style>   