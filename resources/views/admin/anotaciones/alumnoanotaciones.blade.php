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
                        <td>{{$anotacion->Tipo}}</td>
                        <td>{{$anotacion->Descripcion }}</td>
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
