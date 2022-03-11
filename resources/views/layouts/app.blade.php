<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

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
        <footer class="footer-distributed">
 
          <div class="footer-left">
          
          
          <p class="footer-company-name">Maria Teresa Marchant &copy; 2021</p>
          </div>
          
          <div class="footer-center">
          
          
          </div>
          
          <div class="footer-right">
          
          <div class="footer-icons">
          
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          
          </div>
          
          </div>
          
          </footer>
    </body>
    
</html>
<style>
  footer{
 bottom: 0;
}
.footer-distributed{
 background-color: #292c2f;
 box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
 box-sizing: border-box;
 width: 100%;
 text-align: left;
 font: bold 16px sans-serif;
 
 padding: 55px 50px;
 background-color: #312e81;
 height: 8%;

}
 
.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
 display: inline-block;
 vertical-align: top;
}
 
.footer-distributed .footer-left{
 width: 40%;
}
 
.footer-distributed .footer-company-name{
 color:  #8f9296;
 font-size: 100%;
 font-weight: normal;
 margin: 0;
}
 
 
.footer-distributed .footer-center{
 width: 35%;
}
 
 
.footer-distributed .footer-right{
 width: 20%;
}
 
 

 
.footer-distributed .footer-icons a{
 display: inline-block;
 width: 35px;
 height: 35px;
 cursor: pointer;
 background-color:  #33383b;
 border-radius: 2px;
 
 font-size: 20px;
 color: #ffffff;
 text-align: center;
 line-height: 35px;
 
 margin-right: 3px;
 margin-bottom: 10px;
}
 
 
@media (max-width: 880px) {
 
 .footer-distributed{
 font: bold 14px sans-serif;
 
 }
 
 .footer-distributed .footer-left,
 .footer-distributed .footer-center,
 .footer-distributed .footer-right{
 display: block;
 width: 100%;
 margin-bottom: 40px;
 text-align: center;
 }
 
 .footer-distributed .footer-center i{
 margin-left: 0;
 }
 
}
  .container{
    margin:auto;
  }
  .subtitulos{
    font-size: 150%;
    text-align: center;
    margin-top: 10px;
  }
  .subtitulos2{
    font-size: 125%;
  }
  .song{
    text-align: center;
    margin-top: 25px;
  }
  .owl-carousel{
    background: #ffffff;
  }
    .owl-carousel .item {
        width:100%;
        max-width:600px;
        background: #ffffff;
        margin:auto;
    }
    .box{
      display: flex;
      align-items: flex-start;
    }
    .box2{
      display: flex;
      flex-wrap: wrap;
      align-content: space-between;
      align-items: flex-start;
    }
    #tarjeta-fechas{
      text-align: left;
      width: 300px;
      margin-top: 20px;
      margin-left: 25px;
    }
    .tarjeta-noticias{
      display: flex;
      flex-wrap: wrap;
      text-align: left;
      width: 700px;
      margin-top: 20px;
      margin-left: 25px;
      
    }
    .tarjeta-historia{
      display: flex;
      flex-wrap: wrap;
      text-align: left;
      width: 1500px;
      margin-top: 20px;
      margin-left: 25px;
    }
    .tarjeta-profesor{
      display: flex;
      flex-wrap: wrap;
      text-align: left;
      width: 1500px;
      margin-left: 25px;
    }
    .tarjeta-historia2{
      display: flex;
      flex-wrap: wrap;
      width: 1500px;
      margin-top: 20px;
      margin-left: 25px;
    }
    
    #calendar{
        float: left;
    }
    #noticias{
      float: left;
    }
    .centrar{
      position: relative;
    }
    .event-carousel .item h2 {
      color: rgb(0, 0, 0);
      font-weight: 400;
      margin-top: 0rem;
      font-size: 150%;
      justify-content: center;
     }
    .owl-carousel .item h2 {
      color: rgb(0, 0, 0);
      font-weight: 400;
      margin-top: 0rem;
      font-size: 150%;
      position: absolute;
      bottom: 10px;
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
        left: 10px;
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
}

@media only screen and (max-width: 600px) {
  #tarjeta-fechas{
    text-align: left;
    width: 100%;
    margin-top: 10%;
    margin-left: 10%;
  }
  .tarjeta-noticias{
    display: flex;
    flex-wrap: wrap;
    text-align: left;
    width: 100%;
    margin-top: 10%;
    margin-left: 10%;      
  }
  .tarjeta-historia{
    display: flex;
    flex-wrap: wrap;
    text-align: left;
    width: 100%;
    margin-top: 10%;
    margin-left: 10%;
  }
  .tarjeta-profesor{
    display: flex;
    flex-wrap: wrap;
    text-align: left;
    width: 100%;
    margin-left: 10%;
  }
  .tarjeta-historia2{
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    margin-top: 10%;
    margin-left: 10%;
  }
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
  });
</script>
