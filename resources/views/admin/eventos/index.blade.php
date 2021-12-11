<div>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container" style="padding: 30px 0;">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @elseif (session('danger'))
            <div class="alert alert-danger">
                <strong>{{session('danger')}}</strong>
            </div>
        @endif
        <div>
            <div class="col-md-12">
                <div class="panel panel-default" style="">
                    <div style="display: flex; justify-content:center">
                        <div class="panel-heading" style="width: 80%;">
                            <div class="row" >
                                <div class="column" style="width: 50%; font-size:150%">
                                    Imagenes
                                </div>
                                <div class="column" style="width: 50%; justify-content: right; display:flex">
                                    <a href="{{route('admin.evento.create')}}" class="exito">Añadir Eventos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style=" justify-content: center; display:flex" >
                        <table class="tabla" style="margin-right: 5%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Fecha de inicio</th>
                                    <th>Fecha de termino</th>
                                    <th>Fecha de creacion</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eventos as $evento)
                                    <tr>
                                        <td>{{$evento->id}}</td>
                                        <td>{{$evento->Titulo}}</td>
                                        <td>{{$evento->FechaInicio_Evento}}</td>
                                        <td>{{$evento->FechaTermino_Evento}}</td>
                                        <td>{{$evento->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.evento.edit', $evento)}}" class="btn btn-primary">Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.evento.destroy', $evento)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type='submit' class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</div>
