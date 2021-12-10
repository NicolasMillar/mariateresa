<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action="{{route('validar')}}">
            @csrf
            <div>
                <label for="dni">
                    @if($errors->first('Rut'))
                    <p class="text-danger">{{$errors->first('Rut')}}</p>
                    @endif
                </label>
                <x-jet-label for="email" value="Rut" />
                <x-jet-input id="email" class="block mt-1 w-full" type="text" name="Rut"  />
            </div>

            <div class="mt-4">
                <label for="dni">
                    @if ($errors->first('Contraseña'))
                    <p class="text-danger">{{$errors->first('Contraseña')}}</p>                        
                    @endif
                </label>
                <x-jet-label for="password" value="Contraseña" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="Contraseña" />
            </div>

            <div>
                <label for="dni">
                    @if ($errors->first('Tipo_usuario'))
                    <p class="text-danger">{{$errors->first('Tipo_usuario')}}</p>                        
                    @endif
                </label>
                <input type="radio" id="estudiante" name="Tipo_usuario" value="ESTUDIANTE">
                <label for="estudiante">estudiante</label>
                <input type="radio" id="profesor" name="Tipo_usuario" value="PROFESOR">
                <label for="profesor">profesor</label>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
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
    </x-jet-authentication-card>
</x-guest-layout>
