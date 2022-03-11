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
    @foreach($unidad as $unidades)             
        <div style="display: flex; justify-content:center">
            <div class="panel-heading" style="width: 80%;">
                <div class="row" >
                    <div class="column" style="width: 50%; font-size:150%">
                        {{$unidades->Nombre_Unidad}};
                    </div>
                </div>
            </div>
        </div>
        <div style=" justify-content: center; display:flex;" >
                        
            <table class="tabla" style="width: 50%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Notas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materiales as $material)
                        @if ($material->ID_Unidad==$unidades->id)
                            <tr>
                                <td>{{$material->Nombre_Material}}</td>
                                <td><a href="{{$material->Link_Material}}">{{$material->Link_Material}}</a></td>
                            </tr>
                        @endif
                        
                    @endforeach
                </tbody>
                                
            </table>
        </div>
    @endforeach
@endsection
<style></style>    