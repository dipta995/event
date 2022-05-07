<!-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
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
    </x-jet-authentication-card>
</x-guest-layout> -->
<x-guest-layout>
<div class="wrapper">
        <div class="logo"> <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> </div>
        <div class="text-center mt-4 name"> <br> </div>
        <x-jet-validation-errors class="mb-4" />


        <form class="p-3 mt-3" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-field d-flex align-items-center">
                 <span class="far fa-user"></span> 
                 <input  id="userName" placeholder="Enter Email Address" type="email" name="email" :value="old('email')" required autofocus> 
        </div>
            <div class="form-field d-flex align-items-center">
                 <span class="fas fa-key"></span>
                  <input  id="pwd" placeholder="Enter Password" type="password" name="password" required autocomplete="current-password"> </div> 
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
             <a style="margin-left:150px;" href="{{ route('password.request') }}">Forget password?</a> or <a href="{{ url('/register') }}">Sign up</a> </div>
        <style>
            .wrapper {
    max-width: 450px;
    min-height: 500px;
    margin: 80px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff
}
        </style>
    </div>
</x-guest-layout>