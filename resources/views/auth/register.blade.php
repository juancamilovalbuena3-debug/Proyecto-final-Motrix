<x-guest-layout>
    <!-- FONDO GLOBAL de toda la pantalla -->
    <div style="
        background: url('{{ asset('images/fondo-general.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
    ">
        <x-authentication-card>
            <x-slot name="logo">
                <!-- Fondo con imagen detrás del logo Motrix -->
                <div style="
                    background: url('{{ asset('images/logo-bg.jpg') }}') no-repeat center center;
                    background-size: cover;
                    padding: 15px 25px;
                    border-radius: 10px;
                    display: inline-block;
                    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
                ">
                    <a href="{{ url('/') }}">
                        <h1 style="font-size: 28px; font-weight: bold; color: #fff; margin:0; text-shadow: 1px 1px 3px rgba(0,0,0,0.7);">
                            Motrix
                        </h1>
                    </a>
                </div>
            </x-slot>

            <!-- Caja semi-transparente con fondo autonegro.jpg -->
            <div class="bg-white/80 overflow-hidden shadow-xl sm:rounded-lg flex p-6 bg-cover bg-center" 
                 style="background-image: url('{{ asset('images/autonegro.jpg') }}');">

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" class="w-full">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" class="text-white" />
                        <x-input id="name" class="block mt-1 w-full"
                                 type="text" name="name"
                                 :value="old('name')" required autofocus
                                 autocomplete="name" />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" class="text-white" />
                        <x-input id="email" class="block mt-1 w-full"
                                 type="email" name="email"
                                 :value="old('email')" required
                                 autocomplete="username" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" class="text-white" />
                        <x-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-white" />
                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                 type="password"
                                 name="password_confirmation" required
                                 autocomplete="new-password" />
                    </div>

                    <!-- Terms & Privacy -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms" class="text-white">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-white hover:text-gray-200 rounded-md">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-white hover:text-gray-200 rounded-md">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <!-- Submit -->
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-white hover:text-gray-200 rounded-md"
                           href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ms-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </x-authentication-card>
    </div>
</x-guest-layout>
