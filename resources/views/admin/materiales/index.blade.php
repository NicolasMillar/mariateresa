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
                    <th>Nombre</th>
                    <th>Notas</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
                            
        </table>
    </div>
@endsection
<style></style>    