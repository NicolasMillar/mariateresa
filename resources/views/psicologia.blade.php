<x-app-layout>
    <main id="main">
        <div class="container">
            <div class="header">
                <div id="imagen-principal" style="position: relative; text-align: center;">
                    <h1 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 300%; color:white"><b>PSICOLOGOS DEL COLEGIO</b></h1>
                    <img src="{{asset('assets/images/custom/foto-colegio.jpg')}}" alt="" style="width:1600px; height:400px; object-fit: cover; display: flex; margin-left: auto; margin-right: auto;">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="history">
                @foreach ($psicologos as $psicologo)
                    <h1 style="font-size: 150%; margin-left:2%; margin-top:0.5%">{{$psicologo->Nombre_Taller}}</h1>
                    <div class="tarjeta-profesor" style="border: 1px solid orange; height:150px; max-width:1500px; border-radius: 25px">
                        <div class="centrar" style="width: 150px; height: 150px;">
                            <img id="historia" src="{{asset($psicologo->Imagen)}}" style="margin-left:10%; border-radius: 25px; position: absolute; top: 50%; transform: translateY(-50%); width:100%; max-width:120px; height:100%; max-height:120px">
                        </div>
                        <div class="texto-historia" style="margin-left: 20px">
                                <h3 style="font-size: 125%"><b>Nombre: {{$psicologo->Nombre_Psicologo}} {{$psicologo->ApellidoP_Psicologo}} {{$psicologo->ApellidoM_Psicologo}}</b></h3>
                                <h3><b>Rut: {{$psicologo->Rut}}-{{$psicologo->DigitoV_Psicologo}}</b></h3>
                                <h3>Disponibilidad: {{$psicologo->Hora_Inicio}}-{{$psicologo->Hora_Termino}}</h3>
                                <h3>Especialidad: {{$psicologo->Especialidad}}</h3>
                                <h3>Contacto: {{$psicologo->Telefono_Contacto}}</h3>
                                
                        </div>
                    </div>
                @endforeach
                
                
                
            </div>
        </div>
    </main>
</x-app-layout>
