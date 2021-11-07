<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Imagenes
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addhomeslider')}}" class="btn btn-success pull-right">Añadir Imagenes</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table-striped">
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
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{$slider->id}}</td>
                                        <td>{{$slider->Titulo}}</td>
                                        <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="120" /></td>
                                        <td>{{$slider->Link}}</td>
                                        <td>{{$slider->Estado == 1 ? 'Active':'Inactive'}}</td>
                                        <td>{{$slider->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
