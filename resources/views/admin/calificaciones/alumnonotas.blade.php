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
                            <td><input type="text" name="nota" id="nota" value="{{$nota->Notas}}"></td>
                        @endforeach
                        @if ($total!=$cont)
                            <td><input type="text" name="nota" id="new" value="0"></td>
                        @endif
                        <?php $prom=$prom/$total; ?>
                        <td>{{$prom}}</td>
                    </tr>
                </tbody>        
            </table>
            <div style="float: right; width:12% ">
                <button class="btn btn-info">Modifica calificacion</button>
            </div>
            <input type="hidden" name="modificada" id="modificada" value="{{$prueba}}">
        {!! Form::close() !!}  
    </div>
    <script defer>
        var inputTextMensaje = document.getElementById('nota');
        inputTextMensaje.addEventListener('keyup', function(evt) { 
            var nuevo=document.getElementById('modificada');
            $prueba=inputTextMensaje.value;
            nuevo.value=$prueba;
            console.log(nuevo);
        });
    </script> 
@endsection
<style>
    #boton{
        font-size: 20px; 
        border-radius: 12px;
    } 
</style>