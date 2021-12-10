<div>
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container" style="padding: 30px 0;">
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
                                    <a href="{{route('admin.addhomeslider')}}" class="exito">Añadir Imagenes</a>
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
                                    <th>Imagen</th>
                                    <th>Link</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--@foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td>{{$slider->Titulo}}</td>
                                        <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="120" /></td>
                                        <td>{{$slider->Link}}</td>
                                        <td>{{$slider->Estado == 1 ? 'Active':'Inactive'}}</td>
                                        <td>{{$slider->created_at}}</td>
                                    </tr>
                                @endforeach--}}
                                <tr>
                                    <td>hola</td>
                                    <td>estos</td>
                                    <td>son</td>
                                    <td>datos</td>
                                    <td>de</td>
                                    <td>prueba</td>
                                </tr>
                                <tr>
                                    <td>hola</td>
                                    <td>estos</td>
                                    <td>son</td>
                                    <td>datos</td>
                                    <td>de</td>
                                    <td>prueba</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
