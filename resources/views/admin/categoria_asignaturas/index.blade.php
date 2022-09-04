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
        <div>
            <div class="">
                <div class="panel panel-default" style="">
                    <div style="display: flex; justify-content:center">
                        <div class="panel-heading" style="width: 80%;">
                            <div class="row" >
                                <div class="column" style="width: 50%; font-size:150%">
                                    Categorias de Asignaturas
                                </div>
                                <div class="column" style="width: 50%; justify-content: right; display:flex">
                                    <a href="{{route('admin.categoria_asignatura.create')}}" class="exito">Añadir Categorias</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style=" justify-content: center; display:flex;" >
                       
                        <table id="tabla" class="table table-striped table-bordered table-sm" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Minimo Grado</th>
                                    <th>Maximo Grado</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                @php
                                    $grado1=null;
                                    switch ($categoria->Minimo_Grado) {
                                        case 0:
                                            $grado1='PREKINDER';
                                        break;
                                        case 1:
                                            $grado1='KINDER';
                                        break;
                                        case 2:
                                            $grado1='PRIMERO';
                                        break;
                                        case 3:
                                            $grado1='SEGUNDO';
                                        break;
                                        case 4:
                                            $grado1='TERCERO';
                                        break;
                                        case 5:
                                            $grado1='CUARTO';
                                        break;
                                        case 6:
                                            $grado1='QUINTO';
                                        break;
                                        case 7:
                                            $grado1='SEXTO';
                                        break;
                                        case 8:
                                            $grado1='SEPTIMO';
                                        break;
                                        case 9:
                                            $grado1='OCTAVO';
                                        break;
                                            
                                    }
                                    $grado2=null;
                                    switch ($categoria->Maximo_Grado) {
                                        case 0:
                                            $grado2='PREKINDER';
                                        break;
                                        case 1:
                                            $grado2='KINDER';
                                        break;
                                        case 2:
                                            $grado2='PRIMERO';
                                        break;
                                        case 3:
                                            $grado2='SEGUNDO';
                                        break;
                                        case 4:
                                            $grado2='TERCERO';
                                        break;
                                        case 5:
                                            $grado2='CUARTO';
                                        break;
                                        case 6:
                                            $grado2='QUINTO';
                                        break;
                                        case 7:
                                            $grado2='SEXTO';
                                        break;
                                        case 8:
                                            $grado2='SEPTIMO';
                                        break;
                                        case 9:
                                            $grado2='OCTAVO';
                                        break;
                                            
                                    }
                                @endphp
                                    <tr>
                                        <td>{{$categoria->id}}</td>
                                        <td>{{$categoria->Nombre_Categoria}}</td>
                                        <td>{{$grado1}}</td>
                                        <td>{{$grado2}}</td>
                                        
                                        <td>
                                            <form action="{{route('admin.categoria_asignatura.destroy', $categoria)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type='submit' class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
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