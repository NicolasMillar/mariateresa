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
        {!! Form::open(['route'=>['actualizarnotas'] ] )!!}
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 50%; margin-left:25%;">
            <strong>Profesor! Tenga en mente que:</strong> No puede modificar más de una calificación al mismo tiempo.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>          
            <div style="float: right; width:12% ">
                <button class="btn btn-info">Modifica calificacion</button>
            </div>
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
                            <input type="hidden" name="Alumnor" value="{{$nota->Rut}}">
                            <?php $total++; $prom=+$nota->Notas;  $prueba=$nota->Notas ?>
                            <td><input type="text" name="nota" id="nota{{$total}}" value="{{$nota->Notas}}"></td>
                            <input type="hidden" name="id{{$total}}" id="id{{$total}}" value="{{$nota->id}}">
                        @endforeach
                        @if ($total!=$cont)
                            <td><input type="text" name="nota" id="nota{{$cont}}" value="0"></td>
                        @endif
                        <?php $prom=$prom/$total; ?>
                        <td>{{$prom}}</td>
                    </tr>
                </tbody>        
            </table>
            <input type="hidden" name="identificador" id="identificador" value="1">
            <input type="hidden" name="modificada" id="modificada" value="{{$prueba}}">
            {!! Form::close() !!}  
    </div>
    <div style="margin-left: 2%">
        <button type="button" class="btn btn-primary" onclick="MostarGrafico()">MostarGrafico</button>
        <canvas id="myChart" style="height: 65%"></canvas>
    </div>
    @for ($i=0; $i<$total; $i++)
        <input type="hidden" id="{{$i}}" value="{{$promedios [$i]}}">
    @endfor
    <input type="hidden" id="total" value="{{$total}}">

    <!--Script-->
    <script defer>
        $total=document.getElementById('total').value;
        for(var i=1;i<=$total;i++){
            $label="nota"+i;
            var inputTextMensaje = document.getElementById($label);
            inputTextMensaje.addEventListener('keyup', function(evt) { 
                var nuevo=document.getElementById('modificada');
                $prueba=inputTextMensaje.value;
                nuevo.value=$prueba;
                $label="id"+(i-1);
                $id=document.getElementById($label).value;
                console.log($id);
                nuevo=document.getElementById('identificador');
                nuevo.value=$id;
            });
        }
        
    </script>
    <script>
        $total=document.getElementById('total').value;
        const labels= [];
        const dato=[];
        for(var i=1;i<=$total;i++){
            $label="promedio "+i;
            labels.push($label);
            $promedio=document.getElementById((i-1)).value;
            $label="nota"+i;
            $nota=document.getElementById($label).value;
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