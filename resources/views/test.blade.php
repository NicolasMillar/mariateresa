<style>
    .left-div{
        width: 15%;
        height: 93.3%;
        float:left;
        background-color: #312e81;
    }
    .right-div{
        width: 85%;
        height: 90%;
        float:right; 
        text-align:center;
    }
    .foto{
        display:flex;
        justify-content: center;
        margin-top: 5%;
    }
</style>
<x-app-layout>
<div class="left-div" > 
           <nav>
               <x-jet-dropdown align="right">
                    <x-slot name="trigger">
                        <x-jet-nav-link href='#' style="font-size: 150%;">Materiales</x-jet-nav-link>
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
    <div class="right-div" >
        <div class="foto" >
            <img src="http://assets.stickpng.com/images/585e4beacb11b227491c3399.png" style="border-radius: 50%" width="175" height="175">
        </div>
        <div>
            <h1>Rut:</h1>
            <h1>Nombre:</h1>
            <h1>Fecha de nacimiento:</h1>
            <h1>Año de ingreso:</h1>
            <h1>Telefono de contacto:</h1>
            <h1>Mail de contacto:</h1>
        </div>
    </div>
</x-app-layout>
