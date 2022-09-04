<?php 
    use App\Models\Asignatura;
    $sessionusuario = session('nombre');
    $sessiontipo = session('sessiontipo');
    $sessionrut = session('rut');
?>
@extends('layouts.useradmin')
@section('Content')

<div>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container" style="padding: 30px 0;">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
    @foreach($asignaturas as $asignatura)             
        <div style="display: flex; justify-content:center">
            <div class="panel-heading" style="width: 80%;">
                <div class="row" >
                    <div class="column" style="width: 50%; font-size:150%">
                        {{$asignatura->Nombre_Asignatura}}
                    </div>
                </div>
            </div>
        </div>
        <div style=" justify-content: center; display:flex;" >
                        
            <table class="tabla" style="width: 50%">
                <thead>
                    <tr>
                        <th>prueba</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notas as $nota)
                        @if ($nota->ID_Asignatura==$asignatura->id)
                        <tr>
                            <td>{{$nota->Nombre_Prueba}}</td>
                            <td>{{$nota->Notas}}</td>     
                        </tr>
                        @endif
                        
                    @endforeach
                </tbody>
                                
            </table>
        </div>
    @endforeach
    <div style="display: flex; justify-content:center">
        <div class="panel-heading" style="width: 80%;">
            <div class="row" >
                <div class="column" style="width: 50%; font-size:150%">
                    Anotaciones
                </div>
            </div>
        </div>
    </div>
    <div style=" justify-content: center; display:flex;" >
                    
        <table class="tabla" style="width: 50%">
            <thead>
                <tr>
                    <th>Asignatura</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anotaciones as $anotacion)
                    <tr>
                        <td>{{$anotacion->Nombre_Asignatura}}</td>
                        <td>{{$anotacion->Tipo_Anotacion}}</td>
                        <td>{{$anotacion->Descripcion_Anotacion}}</td>
                    </tr>
                @endforeach
            </tbody>
                            
        </table>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>$(document).ready(function() {
        $('#tabla').DataTable();
    } );</script>
</div>

@endsection
<style>
</style>