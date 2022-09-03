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
    $i=0;
?>
@extends('layouts.userprofesor')
@section('Content')
    <div style="text-align:center; margin-top:1% ">
        {!! Form::open(['route'=>['actualizarnotas']] )!!}
        <table class="tabla" style="width: 50%; margin: 0 auto">
            <thead>
                <tr>
                    @for($i=0;$i<$cont;$i++)
                        <th>Notas</th>
                    @endfor
                    <th>Promedio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($notas as $nota)
                        <input type="hidden" name="alumno" value="{{$nota->Rut}}">
                        <input type="hidden" name="asignatura" value="{{$asignatura}}">
                        <td><input type="text" name="{{$i}}" value="{{$nota->Notas}}" id="{{$i}}"></td>
                        <?php $prom=$prom+$nota->Notas; $i++;?>
                    @endforeach
                    <?php
                        if($total!=0){
                            $prom=$prom/$total;
                        } 
                    ?>
                    <td>{{$prom}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <input type="hidden" id="total" name="total" value="{{$total}}"> 
    <div style="float:right; width:12% ">
      <button type="submit" class="btn btn-info" onclick="obtener()">Modificar calificacion</button>
    </div>
    
    {!! Form::close() !!}
    <div style="margin-left: 2%">
        <button type="button" class="btn btn-primary" onclick="MostarGrafico()">MostarGrafico</button>
        <canvas id="myChart" style="height: 65%"></canvas>
    </div>
    
    @for($i=1;$i<=$total;$i++)
        <input type="hidden" id="nota{{$i}}" value="{{$promedios[($i-1)]}}">
    @endfor
    <!--Script-->
    <script>
        $total=document.getElementById('total').value;
        const labels= [];
        const dato=[];
        for(var i=1;i<=$total;i++){
            $label="promedio "+i;
            labels.push($label);
            $nota=document.getElementById((i+1)).value;
            $label="nota"+i;
            $promedio=document.getElementById($label).value;
            $promedio=$nota-$promedio;
            dato.push($promedio);
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
    #boton{
        font-size: 20px; 
        border-radius: 12px;
    } 
</style>