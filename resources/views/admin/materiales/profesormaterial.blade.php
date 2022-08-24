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
    $prom=0;
    $total=0;
?>
@extends('layouts.userprofesor')
@section('Content')
    <div style="text-align:center; margin-top:1% ">   
        <div style="float: right; width:12% ">
            <button class="btn btn-info">Modifica calificacion</button>
        </div>
        <table class="tabla" style="width: 50%; margin: 0 auto">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                @forEach($materiales as $material)
                    <tr>
                        <td>{{$material->Nombre_Material}}</td>
                        <td><a href="{{$material->Link_Material}}">{{$material->Link_Material}} </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Crear Material -->
    <div class="modal fade" id="CreareMaterial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer" id="elemento" style="display:none;">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
</style>