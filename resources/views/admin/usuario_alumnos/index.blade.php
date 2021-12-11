<div>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container" style="padding: 30px 0;">
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif
        <div>
            <div class="">
                <div class="panel panel-default" style="">
                    <div style="display: flex; justify-content:center">
                        <div class="panel-heading" style="width: 80%;">
                            <div class="row" >
                                <div class="column" style="width: 50%; font-size:150%">
                                    Sliders
                                </div>
                                <div class="column" style="width: 50%; justify-content: right; display:flex">
                                    <a href="{{route('admin.usuario_alumno.create')}}" class="exito">Añadir Imagenes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" style=" justify-content: center; display:flex;" >
                        <table class="tabla" style="width: 100%; font-size: 50%; margin-top:1%">
                            <thead>
                                <tr>
                                    <th>Rut</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Apellido P</th>
                                    <th>Apellido M</th>
                                    <th>Direccion</th>
                                    <th>Comuna</th>
                                    <th>Nacimiento</th>
                                    <th>Estado</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Fecha Salida</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumnos as $alumno)
                                    <tr>
                                        <td>{{$alumno->Rut_Alumno}}-{{$alumno->DigitoV_Alumno}}</td>
                                        <td><img src="{{asset($alumno->Imagen)}}" width="80" height="80" style="border-radius: 50%"/></td>
                                        <td>{{$alumno->Nombre_Alumno}}</td>
                                        <td>{{$alumno->ApellidoP_Alumno}}</td>
                                        <td>{{$alumno->ApellidoM_Alumno}}</td>
                                        <td>{{$alumno->Direccion_Alumno}}</td>
                                        <td>{{$alumno->Comuna_Alumno}}</td>
                                        <td>{{$alumno->FechaNacimiento_Alumno}}</td>
                                        <td>{{$alumno->Estado_Alumno}}</td>
                                        <td>{{$alumno->FechaIngreso_Alumno}}</td>
                                        <td>{{$alumno->FechaSalida_Alumno}}</td>
                                        <td>
                                            <a href="{{route('admin.usuario_alumno.edit', $alumno)}}" class="btn btn-primary">Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.usuario_alumno.destroy', $alumno)}}" method="POST">
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
