<x-guest-layout>
    <div class="container">
        <img src="https://i.pinimg.com/564x/f6/f4/e2/f6f4e2584ca92b4348cb48171b240cf3.jpg" style="height:939px; width:100%; padding-left: 22%;">
        <div class="text-block">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTI91X4Elct655bx7O8fLqIVOhQHDC5WyhHOhO2bk4y7tKkooC2FFkukO2n9I1qH2LkwQ&usqp=CAU" >
                <form method="POST" action="{{route('validar')}}">
                    @csrf
                    <div style="margin: 4%">
                        <label for="dni">
                            @if($errors->first('Rut'))
                                <p class="text-danger">{{$errors->first('Rut')}}</p>
                            @endif
                        </label>
                        <x-jet-label for="email" value="Rut" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="text" name="Rut"  />
                    </div>
                    <div style="margin: 4%">
                        <label for="dni">
                            @if ($errors->first('Contraseña'))
                                <p class="text-danger">{{$errors->first('Contraseña')}}</p>                        
                            @endif
                        </label>
                        <x-jet-label for="password" value="Contraseña" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="Contraseña" />
                    </div>
                    <div style="margin: 4%">
                        <label for="dni">
                            @if ($errors->first('Tipo_usuario'))
                                <p class="text-danger">{{$errors->first('Tipo_usuario')}}</p>                        
                            @endif
                        </label>
                        <input type="radio" id="estudiante" name="Tipo_usuario" value="ESTUDIANTE">
                        <label for="estudiante">estudiante</label>
                        <input type="radio" id="profesor" name="Tipo_usuario" value="PROFESOR">
                        <label for="profesor">profesor</label>
                        <input type="radio" id="admin" name="Tipo_usuario" value="ADMINISTRADOR">
                        <label for="admin">administrador</label>
                    </div>
                    <div style="margin: 4%">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div style="margin: 4%">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <x-jet-button class="ml-4">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>
                @if (Session::has('mensaje'))
                    <div class="alert alert-danger">{{Session::get('mensaje')}} </div>
                @endif 
        </div>  
        
    </div>
    
</x-guest-layout>

<style>
.container {
  position: absolute;
  font-family: Arial;
}
.text-block {
  position: absolute;
  top: 15%;
  left: 50%;
  background-color: white;
  width: 25%;
}
img{
    display:block;
    margin:auto;
}
</style>
