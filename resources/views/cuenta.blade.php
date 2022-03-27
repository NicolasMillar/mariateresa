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
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    @if (session('warning'))
    <div class="alert alert-danger">
        <strong>{{session('warning')}}</strong>
    </div>
    @endif
    <div style="text-align: left; margin-top:2%; margin-left:2%" >
        {!! Form::open(['route'=>['cambiarcon']] )!!}
            <div style="width: 100%">
                {!! Form::label('descri', 'Ingrese su contraseña actual') !!} <br>
                {!! Form::password('ContraseñaActual', null, ['class'=>'form-control', 'style'=>'width: 15%']) !!}
                @error('ContraseñaActual')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div style="margin-top:1%; float: left; width: 15%" >
                {!! Form::label('descri', 'Ingrese su nueva contraseña') !!} <br>
                {!! Form::password('contraseñanueva', null, ['class'=>'form-control' ]) !!}
                @error('contraseñanueva')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div style="margin-top:1%; float: left; width: 15%">
                {!! Form::label('descri', 'Repita su nueva contraseña') !!} <br>
                {!! Form::password('confcontraseña', null, ['class'=>'form-control' ]) !!}
                @error('confcontraseña')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div style="margin-top: 3%; margin-left: 1%; float: left; ">
                {!! Form::submit('guardar', ['class'=>'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
<style></style>  