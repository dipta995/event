<!-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
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


        <form class="p-3 mt-3" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-field d-flex align-items-center">
                 <span class="far fa-user"></span>
                 <input  type="text" id="userName" placeholder="Enter your name"  name="name" :value="old('name')" required autofocus autocomplete="name" >
            </div>
            <div class="form-field d-flex align-items-center">
                 <span class="far fa-user"></span>
                 <input type="email"  id="userName" placeholder="Enter Email Address" type="email"name="email" :value="old('email')" required >
            </div>

            <div class="form-field d-flex align-items-center">
                 <span class="fas fa-key"></span>
                  <input  id="pwd" placeholder="Enter Password" type="password" name="password" required autocomplete="new-password">
                </div>
            <div class="form-field d-flex align-items-center">
                 <span class="fas fa-key"></span>
                  <input  id="pwd" placeholder="Enter Password" type="password" name="password_confirmation" required autocomplete="new-password" >
                </div>


            <button class="btn mt-3">Create</button>
        </form>
        <div class="text-center fs-6">
             <p style="margin-left:50px;" href="">Already have an account? <a href="{{ route('login') }}">Log in</a></p> </div>
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
