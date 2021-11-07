<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="..\..\..\node_modules\@splidejs\splide\dist\css\splide.min.css">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script type="text/javascript" src="..\..\..\node_modules\@splidejs\splide\dist\js\splide.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
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
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
<script>
  jQuery(document).ready(function($){
    $('.owl-carousel').owlCarousel({
      stagePadding: 50,
      autoplay:true,
      loop:true,
      nav:true,
      center:true,
      navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
      responsive:{
        0:{
          items:1
        },
        600:{
          items:1
        },
        1000:{
          items:1
         }
      }
    })
  })
</script>