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
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">           
    <div style="" >
        <table id="tabla" class="table table-striped table-bordered table-sm" style="width: 75%">
            <thead>
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Anotaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{$alumno->Rut}}</td>
                        {!! Form::open(['route'=>['anotacionesAlumno']] )!!}
                        <input type="hidden" name="Rut" id="Rut" value="{{$alumno->Rut}}">
                        <td>{{$alumno->Nombre_Alumno }} {{$alumno->ApellidoP_Alumno}}</td>
                        <td>{!! Form::submit("ver Anotaciones", ['class'=>'btn btn-primary']) !!}</td>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
            </tbody>           
        </table>
    </div>

<script>$(document).ready(function() {
    $('#tabla').DataTable();
    } );
</script>  
@endsection
<style></style>  
