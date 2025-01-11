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

                <a href="/"><i class="fas fa-arrow-left"></i>Atrás</a>

              <h1 class="text-2xl font-bold text-gray-800 text-center">Registrate</h1>

            </div>
            <form class="space-y-8" method="POST" action="{{ route('register') }}">
                @csrf
              <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" placeholder="Nombre" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
              </div>

              <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input placeholder="Correo electrónico" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />

              </div>

              <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

              </div>


              <div>
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />


              </div>

              @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
              <div class="mt-4">
                  <x-label for="terms">
                      <div class="flex items-center">
                          <x-checkbox name="terms" id="terms" required />

                          <div class="ms-2">
                              {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                      'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                      'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                              ]) !!}
                          </div>
                      </div>
                  </x-label>
              </div>
          @endif


          <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-button class="ms-4">
                {{ __('Register') }}
            </x-button>
        </div>


            </form>
          </div>
    
          <!-- Right Section (Image) -->
          <div class="hidden lg:block relative">
            <img
              src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
              alt="Desk"
                class="h-[700px] w-[600px] object-cover rounded-lg"
            />
          </div>
        </div>
      </div>


</x-guest-layout>
