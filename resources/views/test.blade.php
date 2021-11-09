<style>
body{
    background: #f5f6fa;
}

.wrapper .sidebar{
    background: rgb(5, 68, 104);
    position: fixed;
    top: 0;
    left: 0;
    width: 225px;
    height: 100%;
    padding: 20px 0;
    transition: all 0.5s ease;
}
.wrapper .sidebar ul li a{
    display: block;
    padding: 13px 30px;
    border-bottom: 1px solid #10558d;
    color: rgb(241, 237, 237);
    font-size: 16px;
    position: relative;
}

.wrapper .sidebar ul li a .icon{
    color: #dee4ec;
    width: 30px;
    display: inline-block;
}

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
    color: #0c7db1;

    background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
    color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
    display: block;
}
</style>
<x-app-layout>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <x-slot name="header">
    </x-slot>
    <div>
        <div style="width: 20%; float:left" class="wrapper"> 
            <div class="sidebar">
                <ul>
                    <li>
                        <a href="#" class="active">
                            <span class="item">Materiales</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="item">Notas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="item">Anotaciones</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="item">Calendario</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div style="width: 80%; float:right; text-align:left">
            <img src="https://img2.freepng.es/20180331/eow/kisspng-computer-icons-user-clip-art-user-5abf13db298934.2968784715224718991702.jpg" width="200" height="200">
            <h1>Rut</h1>
            <h1>Nombre</h1>
            <h1>Fecha de nacimiento</h1>
            <h1>Año de ingreso</h1>
            <h1>Telefono de contacto</h1>
            <h1>Mail de contacto</h1>
        </div>
    </div>
</x-app-layout>
