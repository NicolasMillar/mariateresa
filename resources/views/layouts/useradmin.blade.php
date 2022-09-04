<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--Chart.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
        <!-- full calendar -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/locales-all.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css">
        <!--js bt4 -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!--css bt4 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="..\..\..\node_modules\@splidejs\splide\dist\css\splide.min.css">
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">

        <!--Icons-->
        
        <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script type="text/javascript" src="..\..\..\node_modules\@splidejs\splide\dist\js\splide.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->

            <!-- Page Content -->
            <main>
              <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="icono-escuela">
                  <a class="navbar-brand" href="{{ route('alumnohome') }}">
                    <x-jet-application-mark class="block h-9 w-auto" />
                  </a>
                </div>
                <div class="nombre-escuela">
                  <h1 class="text-center">Escuela Maria Teresa Marchant</h1>
                </div>
                <div class="boton-salir">
                  <button>
                    <a class="Salir" href="{{ route('cerrarsession') }}">
                      <i class="fas fa-power-off"></i> Cerrar Sesión
                    </a>
                  </button>
                </div>
              </nav>
              <div class="left-div" id="left-div">
                <div class="w3-sidebar w3-bar-block w3-card" style="width:15%; font-size:175%; background-color:#2caae1; color:#ffffff">
                  <a href="{{route('usuario_profesor')}}" class="w3-bar-item w3-button w3-border-bottom">Profesor</a>     
                  <a href="{{route('usuario_alumno')}}" class="w3-bar-item w3-button w3-border-bottom">Alumno</a> 
                  <a href="{{route('Cursos')}}" class="w3-bar-item w3-button w3-border-bottom">Curso</a>
                  <a href="{{route('cuenta')}}" class="w3-bar-item w3-button w3-border-bottom">Asignatura</a>
                </div>
              </div>
                <div class="right-div" id="right-div">
                @yield('Content') @section('Content')
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
<style>
  .container{
    margin:auto;
  }
  
  .f-title{
    position: absolute;
    bottom: 10px;
  }
  .owl-carousel .item {
      width:100%;
      max-width:600px;
      background: #bdbec0;
      margin:auto;
  }
  .owl-carousel .item h2 {
    color: rgb(0, 0, 0);
    font-weight: 400;
    margin-top: 0rem;
    font-size: 150%;
 }
  .owl-carousel .nav-btn{
    height: 47px;
    position: absolute;
    width: 26px;
    cursor: pointer;
    top: 100px !important;
  }
  .owl-carousel .owl-prev.disabled,
  .owl-carousel .owl-next.disabled{
    pointer-events: none;
    opacity: 0.2;
  }
  .owl-carousel .prev-slide{
    background: url(https://freakyjolly.com/demo/jquery/OwlCarousel2/nav-icon.png) no-repeat scroll 0 0;
    left: 5%;
    margin-left: 2rem auto;
  }
  .owl-carousel .next-slide{
    background: url(https://freakyjolly.com/demo/jquery/OwlCarousel2/nav-icon.png) no-repeat scroll -24px 0px;
    right: 10px;
  }
  .owl-carousel .prev-slide:hover{
    background-position: 0px -53px;
  }
  .owl-carousel .next-slide:hover{
    background-position: -24px -53px;
  }
  span.img-text {
    text-decoration: none;
    outline: none;
    transition: all 0.4s ease;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    cursor: pointer;
    width: 100%;
    font-size: 23px;
    display: block;
    text-transform: capitalize;
  }
  span.img-text:hover {
    color: #2caae1;
  }
  .left-div{
    width: 15%;
    height: 94%;
    float:left;
    background-color: #312e81;
  }
  .right-div{
    width: 85%;
    height: 94%;
    float:right; 
  }
  .foto{
    display:flex;
    justify-content: center;
    margin-top: 5%;
  }
  .margen{
    margin-top: 5%;
    margin-bottom: 3%;
  }
  .acciones{
    height:95.2%;
  }
  .boton-salir{
    display:flex;
    justify-content: right;
    float: right;
    width: 30%;  
  }
  .Salir{
    border: 2px outset rgb(212, 23, 64);
    display:inline-block;
    font-size:1.25em;
    color: white;
  }
  .up-div{
    background-color: #363294;
    height: 6%;
  }
  .icono-escuela{
    float:left;
    height: 6%;
    width: 5%;
    justify-content: right;
    display: flex;
  }
  .nombre-escuela{
    float:center;
    display:flex;
    height: 6%;
    width: 65%;
    align-content: center;
  }
  .nombre-escuela h1{
    color: #ffffff;
    font-size: x-large;
  }
  .ocultar{
    background-color: #312e81;
    display:inline-block;
    font-size:2em;
    color: white;
    width: 35px;
    height: 35px;
  }
</style>

