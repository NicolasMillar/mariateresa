<div>
    <link rel="stylesheet" href="{{asset('css/add-slider.css')}}">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    
    <div class="container" style="padding: 30px 0;">
        <div>
            <div class="panel-heading">
                <div class="row">
                    <div class="column" style="width: 50%; font-size:150%">
                        Añadir Nueva Imagen
                    </div>
                    <div class="column" style="width: 50%; justify-content: right; display:flex" >
                        <a href="{{route('admin.homeslider')}}" id="volver">Todas Las Imagenes</a>
                    </div>
                </div>
            </div>
            <div class="panel-body" style="justify-content: center; display: flex">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <form class="form-horizontal" wire.submit.prevent="addSlide">
                    <div class="form-group" style="margin-top: 10px">
                        <label class="col-md-4 control-label">titulo</label>
                        <div class="col-md-4">
                            <input type="text" placeholder="titulo" class="form-control input-md" wire:model="titulo"/>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <label class="col-md-4 control-label">Link</label>
                        <div class="col-md-4">
                            <input type="text" placeholder="Link" class="form-control input-md" wire:model="link"/>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <label class="col-md-4 control-label">Imagen</label>
                        <div class="col-md-4">
                            <input type="file" class="input-file" wire:model="imagen"/>
                            @if ($imagen)
                                <img src="{{$imagen->temporaryUrl()}}" width="120"/>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <label class="col-md-4 control-label" >Estado</label>
                        <div class="col-md-4">
                            <select class="form-control" wire:model="estado">
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 10px">
                        <label class="col-md-4 control-label" style="margin-top: 10px"></label>
                        <div class="col-md-4">
                            <button type="submit" class="boton-primario">guardar</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
