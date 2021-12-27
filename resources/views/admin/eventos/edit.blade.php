<div>
    <link rel="stylesheet" href="{{asset('css/add-slider.css')}}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <div class="container" style="padding: 30px 0;">
        <div>
            <div class="panel-heading">
                <div class="row">
                    <div class="column" style="width: 50%; font-size:150%">
                        Editar Evento
                    </div>
                    <div class="column" style="width: 50%; justify-content: right; display:flex" >
                        <a href="{{route('admin.evento.index')}}" id="volver">Todos los eventos</a>
                    </div>
                </div>
            </div>
            <div class="panel-body" style="justify-content: center; display: flex">
                @if (session('info'))
                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                @elseif (session('danger'))
                    <div class="alert alert-danger">
                        <strong>{{session('danger')}}</strong>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body" style="background-color: lightblue">
                        {!! Form::model($evento, ['route'=>['admin.evento.update', $evento], 'method'=>'put']) !!}
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('Titulo', 'TITULO') !!}
                                {!! Form::text('Titulo', null, ['class'=>'form-control', 'placeholder'=>$evento->Titulo]) !!}
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('inicio', 'Fecha de inicio') !!}
                                {!! Form::date('inicio', \Carbon\Carbon::now()); !!}
                                {!! Form::time('horainicio', \Carbon\Carbon::now()); !!}
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                {!! Form::label('termino', 'Fecha de Termino') !!}
                                {!! Form::date('termino', \Carbon\Carbon::now()); !!}
                                {!! Form::time('horatermino', \Carbon\Carbon::now()); !!}
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