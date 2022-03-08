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
    $hoy =\Carbon\Carbon::now();
?>
@extends('layouts.userprofesor')
@section('Content')
    <div style="width: 100%;">
        <div style="width: 100%">
            <div style="float:right; width:12% ">
                <button style="background-color:rgba(62, 62, 248, 0.664) " id="boton" onclick="crearEvaluacion()">Crear Evaluacion</button>
            </div>
            <div style="float: right; width:12% ">
                <button style="background-color:cadetblue " id="boton">Ingresar calificacion</button>
            </div>
            <div style="float: right; width:12% ">
                <button style="background-color:darkolivegreen" id="boton">Modifica calificacion</button>
            </div>        
        </div>
        <div style="text-align:center">
            <table class="tabla" style="width: 50%; margin: 0 auto">
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
    </div>
    

    <!-- Crear evaluacion -->
    <div class="modal fade" id="Crearevaluacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Evaluacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>['prueba.registrar',$cualquiera->id], 'id'=>'registrarEvaluacion' ] )!!}
                        {!! Form::label('FechaE', 'FECHA De Evaluacion') !!}
                        {!! Form::date('FechaE', null,['id'=>'FechaE', 'class'=>'form-control', 'min'=>$hoy]) !!}
                        @error('FechaE')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        {!! Form::label('Descripcion', 'Descripcion de la evaluacion') !!}
                        {!! Form::text('Descripcion', null, ['class'=>'form-control', 'placeholder'=>'Ingrese una descripcion de la evaluacion']) !!}
                        @error('Descripcion')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                        {!! Form::label('semestre', 'Semestre') !!}
                        {!! Form::select('semestre', ['1', '2', '3', '4', '5', '6', '7', '8', '9'], '0', ['class'=>'form-control'] ) !!}
                            @error('semestre')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {!! Form::submit('guardar', ['class'=>'btn btn-primary', 'disabled'=>'registrarEvaluacion.form.invalid']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
  </div>
@endsection
<style>
    #boton{
        font-size: 20px; 
        border-radius: 12px;
    }   
</style>

<script>
    function crearEvaluacion(){
        $("#Crearevaluacion").modal("show");
    }
    
</script>