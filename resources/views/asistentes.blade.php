<x-app-layout>
    <main id="main">
        <div class="container">
            <div class="header">
                <div id="imagen-principal" style="position: relative; text-align: center;">
                    <h1 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 300%; color:white"><b>ASISTENTES DEL COLEGIO</b></h1>
                    <img src="{{asset('assets/images/custom/foto-colegio.jpg')}}" alt="" style="width:1600px; height:400px; object-fit: cover; display: flex; margin-left: auto; margin-right: auto;">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="history">
                @foreach ($asistentes as $item)
                    <h1 style="font-size: 150%; margin-left:2%; margin-top:0.5%">{{$item->Cargo_Asistente}}</h1>
                    <div class="tarjeta-profesor" style="border: 1px solid orange; height:150px; max-width:1500px; border-radius: 25px">
                        <div class="centrar" style="width: 150px; height: 150px;">
                            <img id="historia" src="{{asset($item->Imagen)}}" style="margin-left:10%; border-radius: 25px; position: absolute; top: 50%; transform: translateY(-50%); width:100%; max-width:120px; height:100%; max-height:120px">
                        </div>
                        <div class="texto-historia" style="margin-left: 20px">
                                @php
                                    $credenciales=$titulos->where('Rut_Asistente', '=', $item->Rut_Asistente);
                                @endphp
                                <h3 style="font-size: 125%"><b>{{$item->Nombre_Asistente}} {{$item->ApellidoP_Asistente}} {{$item->ApellidoM_Asistente}}</b></h3>
                                <h3><b>{{$item->Rut_Asistente}}-{{$item->DigitoV_Asistente}}</b></h3>
                                <p><b>Titulos:
                                    @foreach ($credenciales as $credencial)
                                        @if ($loop->first)
                                            {{$credencial->Nombre_EstudiosA}}
                                        @else
                                            , {{$credencial->Nombre_Nombre_EstudiosA}}
                                        @endif
                                        
                                    @endforeach
                                    </b>
                                </p>
                        </div>
                    </div>
                @endforeach
                
                
                
            </div>
        </div>
    </main>
</x-app-layout>
