<div>
    <div>
        <link rel="stylesheet" href="{{asset('css/add-slider.css')}}">
        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <div class="container" style="padding: 30px 0;">
            <div>
                <div class="panel-heading">
                    <div class="row">
                        <div class="column" style="width: 50%; font-size:150%">
                            Editar Asistentes
                        </div>
                        <div class="column" style="width: 50%; justify-content: right; display:flex" >
                            <a href="{{route('admin.asistente.index')}}" id="volver">Todos Los Asistentes</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="justify-content: center; display: flex">
                    <div class="card">
                        <div class="card-body" style="background-color: lightblue">
                            {!! Form::model($asistente, ['route' => ['admin.asistente.update', $asistente], 'method'=>'put', 'enctype'=>'multipart/form-data']) !!}
                                <div class="form-group" style="margin-top: 10px;">
                                    {!! Form::label('Nombre', 'NOMBRE') !!}
                                    {!! Form::text('Nombre', $asistente->Nombre_Asistente, ['class'=>'form-control', 'placeholder'=>'Ingrese el Nombre de el/la asistente']) !!}
                                    @error('Nombre')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    {!! Form::label('ApellidoP', 'APELLIDO PATERNO') !!}
                                    {!! Form::text('ApellidoP', $asistente->ApellidoP_Asistente, ['class'=>'form-control', 'placeholder'=>'Ingrese el Apellido Paterno de el/la asistente']) !!}
                                    @error('ApellidoP')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    {!! Form::label('ApellidoM', 'APELLIDO MATERNO') !!}
                                    {!! Form::text('ApellidoM', $asistente->ApellidoM_Asistente, ['class'=>'form-control', 'placeholder'=>'Ingrese el Apellido materno de el/la asistente']) !!}
                                    @error('ApellidoM')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    {!! Form::label('AnioI', 'AÑO INICIO') !!}
                                    {!! Form::number('AnioI', $asistente->AñoInicio_Asistente, ['class'=>'form-control', 'min'=>'1900', 'max'=>$year]) !!}
                                    @error('AnioI')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    {!! Form::label('Cargo', 'Cargo') !!}
                                    {!! Form::text('Cargo', $asistente->Cargo_Asistente, ['class'=>'form-control', 'placeholder'=>'Ingrese el cargo que ocupa']) !!}
                                    @error('Cargo')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    {!! Form::label('Imagen', 'IMAGEN') !!}
                                    {!! Form::file('Imagen', null, ['class'=>'form-control', 'placeholder'=>'Ingrese una imagen', 'accept'=>'image/*']) !!}
                                    @error('Imagen')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    {!! Form::label('Estado', 'ESTADO') !!}
                                    {!! Form::select('Estado', ['Inactivo', 'Activo'], 'Inactivo', ['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group" style="margin-top: 10px">
                                    
                                    <table class="table table-bordered" id="dynamicTable">  
                                        <tr>
                                            <th>Estudios</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>  
                                            <td>{!! Form::text('addmore[0]', null, ['placeholder'=>'Ingrese el cargo que ocupa', 'class'=>'form-control']) !!}</td>
                                            <td><button type="button" name="add" id="add" class="btn btn-success">Agregar</button></td> 
                                        </tr>
                                    </table> 
                                </div>
                                
                                {!! Form::submit('guardar', ['class'=>'btn btn-primary', 'style'=>'margin-top: 10px']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
    
</div>
<script type="text/javascript">

    var i = 0;

    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<tr><td>{!! Form::text("addmore['+i+']", null, ["placeholder"=>"Ingrese el cargo que ocupa", "class"=>"form-control"]) !!}</td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
    });  
</script>