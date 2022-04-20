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
    $hoy =\Carbon\Carbon::now();
    $promg=0;
    $total=0;
?>
@extends('layouts.userprofesor')
@section('Content')
    <div style="width: 100%;">
        <div style="width: 100%">
            <div style="float:right; width:12% ">
                <button style="background-color:rgba(62, 62, 248, 0.664) " id="boton" onclick="crearEvaluacion()">Crear Evaluacion</button>
            </div>
            <div style="float: right; width:12% ">
                <button style="background-color:cadetblue " id="boton">Ingresar calificacion</button>
            </div>
            <div style="float: right; width:12% ">
                <button style="background-color:darkolivegreen" id="boton">Modifica calificacion</button>
            </div>        
        </div>
        <div style="text-align:center">
            <table class="tabla" style="width: 50%; margin: 0 auto">
                <thead>
                    <tr>
                        <th>Rut Alumno</th>
                        @for($i=0;$i<$cont;$i++)
                            <th>Notas</th>
                        @endfor
                        <th>Promedio</th>
                        <th>Inspeccionar </th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($participantes as $participante)
                        <?php $cant=0; $prom=0; $total++; $pruebas=0;?>
                        <tr>
                            <td>{{$participante->Rut}}</td>
                            @foreach ($notas as $nota)
                                @if ($nota->Rut == $participante->Rut)
                                    <td>{{$nota->Notas}}</td>
                                    <?php 
                                        $cant++;
                                        $prom=$prom+$nota->Notas;
                                        $pruebas++;
                                    ?>      
                                @endif
                            @endforeach
                            @if($pruebas<$cont)
                                @for($i=$pruebas;$i<$cont;$i++)
                                    <td><input type="text" name="{{$participante->Rut}}" id="{{$participante->Rut}}"></td>
                                @endfor
                            @endif
                            <?php $prom=$prom/$cant; $promg=$promg+$prom;?>
                            <td>{{$prom}}</td>
                            <td><i class="fas fa-eye"></i></td>
                        </tr>
                   @endforeach
                </tbody>
                <tfoot >
                    <tr >
                        <th style="background-color:rgb(241, 240, 240)"></th>
                        @for($i=0;$i<$cont;$i++)
                            <th style="background-color: rgb(65, 65, 236)">Promedio Notas:{{$promedios [$i]}} </th>
                        @endfor
                        <?php $promg=$promg/$total; ?>
                        <th style="background-color:rgb(65, 65, 236)">Promedio Final: {{$promg}}</th>
                    </tr>    
                </tfoot>            
            </table>
        </div>
    </div>
    

    <!-- Crear evaluacion -->
    <div class="modal fade" id="Crearevaluacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Evaluacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>['prueba.registrar',$cualquiera->id], 'id'=>'registrarEvaluacion' ] )!!}
                        {!! Form::label('Fe', 'FECHA De Evaluacion') !!}
                        <input type="hidden" name="asignatura" id="asignatura" value="{{$cualquiera->id}}">
                        {!! Form::date('FechaE', null,['id'=>'FechaE', 'class'=>'form-control', 'min'=>$hoy]) !!}
                        {!! Form::label('descri', 'Descripcion de la evaluacion') !!}
                        <input type="text" id="descripcionc" name="Descripcionc">
                        {!! Form::label('sem', 'Semestre') !!}
                        {!! Form::select('semestre', ['1', '2', '3', '4', '5', '6', '7', '8', '9'], '0', ['class'=>'form-control'] ) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"  id="Guardar" disabled>Guardar cambios</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
  </div>

<script defer>
    var inputTextMensaje = document.getElementById('descripcionc');
      var buttonEnviar = document.getElementById('Guardar');
  
      inputTextMensaje.addEventListener('keyup', function(evt) { 
          var valueTextField = inputTextMensaje.value.trim();
          buttonEnviar.disabled = (valueTextField == "");
      });
</script> 
@endsection
<style>
    #boton{
        font-size: 20px; 
        border-radius: 12px;
    }   
</style>


<script >
    function crearEvaluacion(){
        $("#Crearevaluacion").modal("show");
    }
</script>