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
                            Editar Profesor
                        </div>
                        <div class="column" style="width: 50%; justify-content: right; display:flex" >
                            <a href="{{route('admin.usuario_profesor.index')}}" id="volver">Todos Los Profesores</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="justify-content: center; display: flex">
                    <div class="card">
                        <div class="card-body" style="background-color: lightblue">
                            {!! Form::model($pusuario, ['route' => ['admin.usuario_profesor.update', $pusuario], 'method'=>'put', 'enctype'=>'multipart/form-data', 'id'=>'formulario-dinamico']) !!}
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    {!! Form::label('Nombre', 'NOMBRE') !!}
                                    {!! Form::text('Nombre', $pusuario->Nombre_Profesor, ['class'=>'form-control', 'placeholder'=>'Ingrese el Nombre de el/la usuario_profesor']) !!}
                                    @error('Nombre')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group" style="margin-top: 10px;">
                                    {!! Form::label('FechaI', 'FECHA INICIO') !!}
                                    {!! Form::date('FechaI', $pusuario->FechaInicio_Profesor, ['class'=>'form-control', 'min'=>'1900-01-01', 'max'=>$date]) !!}
                                    @error('FechaI')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    {!! Form::label('Password', 'CONTRASEÑA') !!}
                                    {!! Form::password('Password', null, ['class'=>'form-control', 'minlenght'=>'8']) !!}
                                    @error('Password')
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
                                            
                                        </tr>
                                        <tr>  
                                            <td>{!! Form::text('addmore[0]', null, ['placeholder'=>'Ingrese las titulos que posee', 'class'=>'form-control']) !!}</td>
                                            
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
