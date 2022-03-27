
    
    

<div>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
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
                                    Cursos
                                </div>
                                <div class="column" style="width: 50%; justify-content: right; display:flex">
                                    <a href="{{route('admin.curso.create')}}" class="exito">Añadir cursos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style=" justify-content: center; display:flex" >
                        <table id="tabla" class="table table-striped table-bordered table-sm" style="margin-right: 5%; width: 100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Grado</th>
                                    <th>Letra</th>
                                    <th>Año</th>
                                    <th>Estado</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                    <th>agregar</th>
                                    <th>alumnos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $curso)
                                @php
                                    $grado=null;
                                    switch ($curso->Grado) {
                                        case 0:
                                            $grado='PREKINDER';
                                        break;
                                        case 1:
                                            $grado='KINDER';
                                        break;
                                        case 2:
                                            $grado='PRIMERO';
                                        break;
                                        case 3:
                                            $grado='SEGUNDO';
                                        break;
                                        case 4:
                                            $grado='TERCERO';
                                        break;
                                        case 5:
                                            $grado='CUARTO';
                                        break;
                                        case 6:
                                            $grado='QUINTO';
                                        break;
                                        case 7:
                                            $grado='SEXTO';
                                        break;
                                        case 8:
                                            $grado='SEPTIMO';
                                        break;
                                        case 9:
                                            $grado='OCTAVO';
                                        break;
                                            
                                    }
                                @endphp
                                    <tr>
                                        <td>{{$curso->id}}</td>
                                        <td>{{$grado}}</td>
                                        <td>{{$curso->Valor_Curso}}</td>
                                        <td>{{$curso->Anio_Academico}}</td>
                                        <td>{{$curso->Estado_Curso}}</td>
                                        <td>
                                            <a href="{{route('admin.curso.edit', $curso)}}" class="btn btn-primary">Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.curso.destroy', $curso)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type='submit' class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{route('participante.create', $curso)}}" class="btn btn-success">Agregar Alumnos</a>
                                        </td>
                                        <td>
                                            <a href="{{route('participante.index', $curso)}}" class="btn btn-success">Ver Alumnos</a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>$(document).ready(function() {
        $('#tabla').DataTable();
    } );</script>
</div>
