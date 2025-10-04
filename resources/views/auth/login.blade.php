<x-guest-layout>
    <div style="
        background: url('{{ asset('images/moto1.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    ">
        <!-- Aquí el formulario con fondo carroo.jpg -->
        <div style="
            background: url('{{ asset('images/carroo.jpg') }}') no-repeat center center;
            background-size: cover;
            border-radius: 12px;
            padding: 30px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.4);
        ">
            <x-slot name="logo">
                <a href="{{ url('/') }}">
                    <h1 style="font-size: 28px; font-weight: bold; color: #fff; margin:0; text-align:center;">
                        Motrix
                    </h1>
                </a>
            </x-slot>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" style="background: rgba(0,0,0,0.5); padding: 20px; border-radius: 10px;">
                @csrf

                <!-- Email -->
                <div>
                    <x-label for="email" value="{{ __('Email') }}" style="color: white;" />
                    <x-input id="email" class="block mt-1 w-full"
                             type="email" name="email"
                             :value="old('email')" required autofocus
                             autocomplete="username" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" style="color: white;" />
                    <x-input id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required
                             autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-white hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ms-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
