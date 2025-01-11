<x-guest-layout>

        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>



        <div class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-lg grid grid-cols-1 lg:grid-cols-2">

              <!-- Left Section (Form) -->
              <div class="p-6 sm:p-8 lg:p-12">
                <div class="mb-8">

                    <x-validation-errors class="mb-4" />

                    @session('status')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ $value }}
                        </div>
                    @endsession
    
                 <a href="/"><i class="fa-solid fa-arrow-left"></i>Atrás</a>

                  <h1 class="text-2xl font-bold text-gray-800 text-center">Iniciar sesión con tu cuenta</h1>

                </div>
                <form class="space-y-8" method="POST" action="{{ route('login') }}">
                    @csrf
                  <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" placeholder="Email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
    
                  </div>
                  <div>
                    <x-label for="password" value="Contraseña" />
                    <x-input id="password" placeholder="Contraseña" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
    
                  </div>
                  <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
    
                 
                  </div>

                  <x-button>
                  INCIAR SESIÓN
                </x-button>

                <a class="block text-sm space-y-5 text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                  ¿Aún no tienes cuenta? Ir a registrarme
               </a>

                </form>
              </div>
        
              <!-- Right Section (Image) -->
              <div class="hidden lg:block relative">
                <img
                  src="https://images.unsplash.com/photo-1529539795054-3c162aab037a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                  alt="Desk"
                    class="h-[700px] w-[600px] object-cover rounded-lg"
                />
              </div>
            </div>
          </div>


</x-guest-layout>
