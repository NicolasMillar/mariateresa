<div>
    <link rel="stylesheet" href="{{asset('css/add-slider.css')}}">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="container" style="padding: 30px 0;">
        <div>
            <div class="panel-heading">
                <div class="row">
                    <div class="column" style="width: 50%; font-size:150%">
                        Añadir Nuevo Slider
                    </div>
                    <div class="column" style="width: 50%; justify-content: right; display:flex" >
                        <a href="{{route('admin.homeslider.index')}}" id="volver">Todos Los Sliders</a>
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
                        {!! Form::open(['route'=>'admin.homeslider.store', 'enctype'=>'multipart/form-data']) !!}
                            
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('Link', 'LINK') !!}
                                {!! Form::text('Link', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Link de la imagen']) !!}
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('Image', 'IMAGEN') !!}
                                {!! Form::file('Image', null, ['class'=>'form-control', 'placeholder'=>'Ingrese una imagen', 'accept'=>'image/*']) !!}
                                @error('Image')
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
