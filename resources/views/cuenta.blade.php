<?php 
    use App\Models\Asignatura;
    $sessionrut = session('rut');
    $sessionusuario = session('nombre');
    $sessiontipo = session('sessiontipo');
    $sessionasignatura = Asignatura::hydrate(Session::get('asignaturas'));
    $sessionasignatura = collect($sessionasignatura);
    $hoy =\Carbon\Carbon::now();
?>

@extends('layouts.userprofesor')
@section('Content')
    {!! Form::open(['route'=>['anotacionesAlumno']] )!!}
    {!! Form::label('descri', 'Ingrese la contraseña actual') !!} <br>
    <input type="text" id="contraseñaactual" name="contraseñaactual"> <br>
    <input type="text" id="contraseñanueva" name="contraseñanueva" placeholder="contraseña nueva">
    <input type="text" id="confcontraseña" name="confcontraseña" placeholder="Repetir contraseña">
    {!! Form::close() !!}
@endsection
<style></style>  