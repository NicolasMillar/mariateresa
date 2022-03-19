<?php 
    use App\Models\Asignatura;
    $sessionrut = session('rut');
    $sessionusuario = session('nombre');
    $sessiontipo = session('sessiontipo');
    $sessionasignatura = Asignatura::hydrate(Session::get('asignaturas'));
    $sessionasignatura = collect($sessionasignatura);
    $hoy =\Carbon\Carbon::now();
?>

@extends('layouts.userprofesor')
@section('Content')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">           
     <div style="float: right; margin-top:1%;">
        <button onclick="agregarAnotacion()" style="background-color: #4CAF50; font-size: 20px; border-radius: 12px;">Agregar Anotacion</button>
    </div>
    <div style=" justify-content: center; display:flex; margin-top:2.5%" >
        <table id="tabla" class="table table-striped table-bordered table-sm" style="width: 110%;">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Asignatura</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anotaciones as $anotacion)
                    <tr>
                        <td>{{$anotacion->Tipo_Anotacion}}</td>
                        <td>{{$anotacion->Descripcion_Anotacion }}</td>
                        <td>{{$anotacion->Nombre_Asignatura }}</td>
                    </tr>
                @endforeach
            </tbody>           
        </table>
    </div>
   

 <!-- Agregar anotacion -->
 <div class="modal fade" id="Agregaranotacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Evaluacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>['anotacionesagregar'] ] )!!}
                    <input type="hidden" name="Fecha" id="Fecha" value="{{$hoy}}">
                    <input type="hidden" name="idasignatura" id="idasignatura" value="{{$asignatura}}">
                    {!! Form::label('descri', 'Descripcion de la anotacion') !!}
                    {!! Form::text('Descripcion', null, ['class'=>'form-control', 'placeholder'=>'Ingrese una descripcion de la anotacion']) !!}
                    {!! Form::label('sem', 'Tipo de anotacion') !!}
                    {!! Form::select('semestre', ['positiva', 'negativa'], '0', ['class'=>'form-control'] ) !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"  >Guardar cambios</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script>$(document).ready(function() {
    $('#tabla').DataTable();
    } );
</script>  
@endsection
<style></style>  
<script>
    function agregarAnotacion(){
        $("#Agregaranotacion").modal("show");
    }
</script>
