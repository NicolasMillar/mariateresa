<x-app-layout>
    <main id="main">
        <div class="container">
            <div class="header">
                <div id="imagen-principal" style="position: relative; text-align: center;">
                    <h1 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 300%; color:black"><b>COMENTARIOS</b></h1>
                    <img src="{{asset('assets/images/custom/callcenter.jpg')}}" alt="" style="width:1600px; height:400px; object-fit: cover; display: flex; margin-left: auto; margin-right: auto;">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="comentarios" style="margin: auto; max-width: 500px; height:400px; position: relative">
                <div style="margin-left:10px ;position: absolute; top: 50%; transform: translateY(-50%);">
                    <form method="POST" action="">
                        <label for="w3review" style="margin-left: 10px">Comentario</label>
                        <textarea id="w3review" name="w3review" rows="4" cols="50" style="border-radius: 25px">Escribe tu comentario aqui</textarea>
                        <x-jet-button style="margin-left: 5px">
                            {{ __('Enviar comentario') }}
                        </x-jet-button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>