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
    <div style=" justify-content: center; display:flex; margin-top:2.5%" >
        <table id="tabla" class="" style="">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anotaciones as $anotacion)
                    <tr>
                        <td>{{$anotacion->tipo}}</td>
                        <td>{{$anotacion->Descripcion }}</td>
                    </tr>
                @endforeach
            </tbody>           
        </table>
    </div>
@endsection
<style></style>  
