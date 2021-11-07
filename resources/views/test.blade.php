<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <form action="{{route('admin.files.store' )}}" method="POST">
            @csrf 
            <input type="file" name="file" id="">
            <button type="submit">Subir Imagen</button>
        </form>
    </div>
</x-app-layout>
