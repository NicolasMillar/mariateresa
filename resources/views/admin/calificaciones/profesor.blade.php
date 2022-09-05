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
    $j=0;
?>
@extends('layouts.userprofesor')
@section('Content')
    <div style="width: 100%; margin-top:1.5%;">
        <div style="width: 100%">
            <div style="float:right; width:12% ">
                <button class="btn btn-info" onclick="crearEvaluacion()">Crear Evaluacion</button>
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
                                    <td><input type="text" name="{{$participante->Rut}}" id="alumno{{$j}}"></td>
                                @endfor
                            @endif
                            <?php 
                                if($cant!=0){
                                    $prom=$prom/$cant; 
                                    $promg=$promg+$prom; 
                                    $j=$j+1;
                                }
                            ?>
                            <td>{{$prom}}</td>
                            {!! Form::open(['route'=>['notasAlumno']] )!!}
                                <input type="hidden" name="Asignatura" value="{{$cualquiera->id}}">
                                <input type="hidden" name="Alumnor" value="{{$participante->Rut}}">
                                <td><button type="submit" class="btn btn-primary"  id="Revisar"><i class="fas fa-eye"></i></button></td>
                            {!! Form::close() !!}
                        </tr>
                        </tr>
                   @endforeach
                   <input type="hidden" id="cantidadNotas" value="{{$j}}">
                </tbody>
                <tfoot >
                    <tr >
                        <th style="background-color:rgb(241, 240, 240)"></th>
                        @for($i=0;$i<$cont;$i++)
                            @if(isset($promedios[$i]))
                                <th style="background-color: rgb(65, 65, 236)">Promedio Notas: {{$promedios [$i]}} </th>
                                <input type="hidden" id="{{$i}}" value="{{$promedios [$i]}}">        
                            @else
                                <th style="background-color: rgb(65, 65, 236) ">Promedio Notas: 0 </th>
                                <input type="hidden"  id="{{$i}}" value="0">
                            @endif
                        @endfor
                        <?php
                            if($total!=0){
                                $promg=$promg/$total; 
                            }   
                        ?>
                        <th style="background-color:rgb(65, 65, 236)">Promedio Final: {{$promg}}</th>
                    </tr>    
                </tfoot>            
            </table>
            <div style="float: right; width:12% ">
                {!! Form::open(['route'=>['notasup']] )!!}
                    <input type="hidden" id="total" name="total" value="{{$total}}">
                    <?php $alumnos=0; ?>
                    @foreach ($participantes as $participante)
                        <input type="hidden" id="{{$alumnos}}" name="{{$alumnos}}" value="{{$participante->Rut}}">
                        <input type="hidden" name="N{{$alumnos}}" id="N{{$alumnos}}" value="1">
                        <?php $alumnos++; ?>
                    @endforeach
                    <input type="hidden" id="identificador" value="{{$id}}" name="identificador">
                    <button type="submit" class="btn btn-info" onclick="obtener()"> Subir calificacion</button>
                {!! Form::close() !!}
            </div>     
        </div>
        <button type="button" class="btn btn-primary" onclick="MostarGrafico()">MostarGrafico</button>
        <div style="margin-left: 2%">
            <canvas id="myChart" style="height: 65%"></canvas>
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
                <div class="modal-footer" id="elemento" >
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
    <!--Script para el Grafico -->
    <script>
        $total=document.getElementById('total').value;
        const labels= [];
        const dato=[];
        console.log($total);
        for(var i=1;i<=$total;i++){
            $label="promedio "+i;
            labels.push($label);
            $nota=document.getElementById((i-1)).value;
            dato.push($nota);
        }
    const data = {
        labels: labels,
        datasets: [{
        label: 'Variacion promedio curso',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: dato,
        }]
    };
    const config = {
        type: 'line',
        data: data,
        options: {responsive:false}
    };
    const myChart = new Chart(document.getElementById('myChart'),config);
    </script>
@endsection
<style>
    .btn {
        margin-left: 10px;
        margin-right: 10px;
    }
</style>

<!--Script para las funciones -->
<script >
    function crearEvaluacion(){
        $("#Crearevaluacion").modal("show");
    }
    function MostarGrafico(){
        document.getElementById("element").style.display = "block";
    }
    function obtener(){
        $total=document.getElementById('total').value;
        for(var i=0;i<$total;i++){
            $label="alumno"+i;
            $lalbe1="N"+i;
            document.getElementById($lalbe1).value=document.getElementById($label).value;;
        }
    }
</script>