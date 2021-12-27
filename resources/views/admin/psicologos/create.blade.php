<div>
    <link rel="stylesheet" href="{{asset('css/add-slider.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="container" style="padding: 30px 0;">
        <div>
            <div class="panel-heading">
                <div class="row">
                    <div class="column" style="width: 50%; font-size:150%">
                        Añadir Nuevo Psicologo
                    </div>
                    <div class="column" style="width: 50%; justify-content: right; display:flex" >
                        <a href="{{route('admin.psicologo.index')}}" id="volver">Todos Los Psicologos</a>
                    </div>
                </div>
            </div>
            <div class="panel-body" style="justify-content: center; display: flex">
                
                <div class="card">
                    <div class="card-body" style="background-color: lightblue">
                        @if (session('info'))
                            <div class="alert alert-success">
                                <strong>{{session('info')}}</strong>
                            </div>
                        @endif
                        {!! Form::open(['route'=>'admin.psicologo.store', 'enctype'=>'multipart/form-data', 'id'=>'formulario-dinamico']) !!}
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group" style="margin-top: 10px;">
                                        {!! Form::label('Rut', 'RUT') !!}
                                        {!! Form::text('Rut', null, ['class'=>'form-control', 'placeholder'=>'Ingrese un Rut sin digito verificador', 'maxlength'=>'10']) !!}
                                        @error('Rut')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" style="margin-top: 10px;">
                                        {!! Form::label('DV', 'DV') !!}
                                        {!! Form::text('DV', null, ['class'=>'form-control', 'maxlength'=>'1', 'width'=>'250' ]) !!}
                                        @error('DV')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('Nombre', 'NOMBRE') !!}
                                {!! Form::text('Nombre', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Nombre del psicologo']) !!}
                                @error('Nombre')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('ApellidoP', 'APELLIDO PATERNO') !!}
                                {!! Form::text('ApellidoP', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Apellido Paterno del psicologo']) !!}
                                @error('ApellidoP')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('ApellidoM', 'APELLIDO MATERNO') !!}
                                {!! Form::text('ApellidoM', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Apellido materno del psicologo']) !!}
                                @error('ApellidoM')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('HoraI', 'HORA DE INICIO') !!}
                                {!! Form::time('HoraI', null, ['class'=>'form-control']) !!}
                                @error('HoraI')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('HoraT', 'HORA DE TERMINO') !!}
                                {!! Form::time('HoraT', null, ['class'=>'form-control']) !!}
                                @error('HoraT')
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
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('Telefono', 'TELEFONO DE CONTACTO') !!}
                                {!! Form::text('Telefono', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el telefono de contacto del psicologo']) !!}
                                @error('Telefono')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('Especialidad', 'ESPECIALIDAD') !!}
                                {!! Form::text('Especialidad', null, ['class'=>'form-control', 'placeholder'=>'Ingrese la especialidad del psicologo']) !!}
                                @error('Especialidad')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
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