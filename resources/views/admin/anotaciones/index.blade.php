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
@extends('layouts.user')
@section('Content')             
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
@endsection
<style></style>   