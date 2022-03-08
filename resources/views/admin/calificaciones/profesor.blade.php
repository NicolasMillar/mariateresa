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
                    {!! Form::open(['route'=>['prueba.registrar',$cualquiera]]) !!}
                    <div class="form-group" style="margin-top: 10px;">
                        {!! Form::label('inicio', 'Fecha de evaluacion') !!}
                        {!! Form::date('inicio', \Carbon\Carbon::now()); !!}
                    </div>
                    <h6>Descripcion de la evaluacion</h6>
                    <input type="text" name="" id="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {!! Form::submit('guardar', ['class'=>'btn btn-primary']) !!}
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