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
        <div style="float: right; width:20% ">
            <button class="btn btn-info" onclick="crearMateriales()" style="margin-right: 1%">Crear Material</button>
            <button class="btn btn-info" onclick="modificarMateriales()">Modificar Material</button>
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
    <div class="modal fade" id="CrearMaterial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear nuevo material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>['CrearMateriales'] ])!!}
                        {!! Form::label('D', 'Ingrese una descripción: ') !!}
                        <input type="hidden" name="asignatura" id="asignatura" value="{{$asignatura}}">
                        <input type="text" id="descripcion" name="Descripcion" style="margin-left: 1%; margin-bottom:1%;">
                        {!! Form::label('l', 'Ingrese un link: ') !!}
                        <input type="text" id="link" name="link" style="margin-left: 13.8%">
                </div>
                <div class="modal-footer" id="elemento" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"  id="Guardar" disabled>Guardar cambios</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Modificar Material -->
    <div class="modal fade" id="ModificarMaterial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>['CrearMateriales'] ])!!}
                        <select name="Material">
                            @forEach($materiales as $material)
                                <option value="{{$material->id}}">{{$material->Nombre_Material}}</option>
                            @endforeach  
                        </select>
                        <p></p>
                        {!! Form::label('D', 'Ingrese una descripción: ') !!}
                        <input type="hidden" name="asignatura" id="asignatura" value="{{$asignatura}}">
                        <input type="text" id="descripcion" name="Descripcion" style="margin-left: 1%; margin-bottom:1%;">
                        {!! Form::label('l', 'Ingrese un link: ') !!}
                        <input type="text" id="link" name="link" style="margin-left: 13.8%"> 
                </div>
                <div class="modal-footer" id="elemento" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"  id="Guardar" disabled>Guardar cambios</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!--Control del boton enviar -->
    <script defer>
        var inputTextMensaje = document.getElementById('descripcion');
        var inputTextMensajes = document.getElementById('link');
        var buttonEnviar = document.getElementById('Guardar');
    
        inputTextMensaje.addEventListener('keyup', function(evt) { 
            var valueTextField = inputTextMensaje.value.trim();
            var valueTextFields = inputTextMensajes.value.trim();
            buttonEnviar.disabled = (valueTextField == "" && valueTextFields == "");
        });
    </script> 
@endsection
<style>
</style>
<script>
    function crearMateriales(){
        $("#CrearMaterial").modal("show");
    }

    function modificarMateriales(){
        $("#ModificarMaterial").modal("show");
    }
</script>