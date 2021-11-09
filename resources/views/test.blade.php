<style>
    .left-div{
        width: 15%;
        height: 100%;
        float:left;
        background-color: #312e81;
    }
    .right-div{
        width: 85%;
        height: 100%; 
        float:right;
        text-align:center;
    }
    #imagen{
        text-align: center;
    }
</style>
<x-app-layout>
<div class="left-div" > 
           <nav>
               <x-jet-dropdown align="right">
                    <x-slot name="trigger">
                        <x-jet-nav-link href='#'>Materiales</x-jet-nav-link>
                    </x-slot>
                    <x-slot name="content">
                    <x-jet-dropdown-link class="text" href="" >
                        Placeholder
                    </x-jet-dropdown-link>
                    </x-slot>
               </x-jet-dropdown>
               <x-jet-dropdown>
                    <x-slot name="trigger">
                        <x-jet-nav-link href='#'>Notas</x-jet-nav-link>
                    </x-slot>
                    <x-slot name="content">
                    <x-jet-dropdown-link class="text" href="" >
                        Placeholder
                    </x-jet-dropdown-link>
                    </x-slot>
               </x-jet-dropdown>
               <x-jet-dropdown>
                    <x-slot name="trigger">
                        <x-jet-nav-link href='#'>Anotaciones</x-jet-nav-link>
                    </x-slot>
                    <x-slot name="content">
                    <x-jet-dropdown-link class="text" href="" >
                        Placeholder
                    </x-jet-dropdown-link>
                    </x-slot>
               </x-jet-dropdown>
               <x-jet-dropdown>
                    <x-slot name="trigger">
                        <x-jet-nav-link href='#'>Calendario</x-jet-nav-link>
                    </x-slot>
                    <x-slot name="content">
                    <x-jet-dropdown-link class="text" href="" >
                        Placeholder
                    </x-jet-dropdown-link>
                    </x-slot>
               </x-jet-dropdown>
               <x-jet-dropdown>
                    <x-slot name="trigger">
                        <x-jet-nav-link href='#'>Cuenta</x-jet-nav-link>
                    </x-slot>
                    <x-slot name="content">
                    <x-jet-dropdown-link class="text" href="" >
                        Placeholder
                    </x-jet-dropdown-link>
                    </x-slot>
               </x-jet-dropdown>
           </nav>
    </div>
    <div class="right-div">
        <img src="https://img2.freepng.es/20180331/eow/kisspng-computer-icons-user-clip-art-user-5abf13db298934.2968784715224718991702.jpg" width="200" height="200">
        <h1>Rut:</h1>
        <h1>Nombre:</h1>
        <h1>Fecha de nacimiento:</h1>
        <h1>Año de ingreso:</h1>
        <h1>Telefono de contacto:</h1>
        <h1>Mail de contacto:</h1>
    </div>
</x-app-layout>
