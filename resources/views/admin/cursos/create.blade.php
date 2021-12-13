@php
    use App\Models\Usuario_profesor;

    $profesor= new Usuario_profesor;
    
@endphp
<div>
    <link rel="stylesheet" href="{{asset('css/add-slider.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="container" style="padding: 30px 0;">
        <div>
            <div class="panel-heading">
                <div class="row">
                    <div class="column" style="width: 50%; font-size:150%">
                        Añadir Nuevo Curso
                    </div>
                    <div class="column" style="width: 50%; justify-content: right; display:flex" >
                        <a href="{{route('admin.curso.index')}}" id="volver">Todos Los Cursos</a>
                    </div>
                </div>
            </div>
            <div class="panel-body" style="justify-content: center; display: flex">
                @if (session('info'))
                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                @endif
                
                <div class="card">
                    <div class="card-body" style="background-color: lightblue">
                        {!! Form::open(['route'=>'admin.curso.store', 'enctype'=>'multipart/form-data', 'id'=>'formulario-dinamico']) !!}
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group" style="margin-top: 10px;">
                                        {!! Form::label('Grado', 'GRADO') !!}
                                        {!! Form::select('Grado', ['PRIMERO', 'SEGUNDO', 'TERCERO', 'CUARTO', 'QUINTO', 'SEXTO', 'SEPTIMO', 'OCTAVO', 'PREKINDER', 'KINDER'], '0', ['class'=>'form-control']) !!}
                                        @error('Grado')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" style="margin-top: 10px;">
                                        {!! Form::label('Letra', 'LETRA') !!}
                                        {!! Form::text('Letra', null, ['class'=>'form-control']) !!}
                                        @error('Letra')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-top: 10px;">
                                        {!! Form::label('Anio', 'AÑO ACADEMICO') !!}
                                        {!! Form::number('Anio', $year, ['class'=>'form-control', 'min'=>'1900', 'max'=>$year]) !!}
                                        @error('Anio')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" style="margin-top: 10px">
                                {!! Form::label('Estado', 'ESTADO') !!}
                                {!! Form::select('Estado', ['Inactivo', 'Activo'], 'Inactivo', ['class'=>'form-control']) !!}
                                @error('Estado')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group" style="margin-top: 10px">
                                {!! Form::label('Profesor', 'Profesor') !!}
                                {!! Form::select('Profesor', Usuario_profesor::all()->pluck('full_name', 'Rut_Profesor'), null, ['placeholder' => 'Elija un profesor', 'class'=>'form-control']) !!}
                                @error('Profesor')
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