<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Register</title>
        {{-- Bootstrap 5 links --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/db676e76a0.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;1,6..12,200;1,6..12,300;1,6..12,400&family=Nunito:wght@200;300;400;500;600&display=swap" rel="stylesheet">
          
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/tap.png') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>


    </head>
    <body >
    <x-app-layout>




<x-guest-layout>
    <h2 class="text-lg text-center mt-2 mb-3">Create an account</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-2">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

<!-- Password -->
<div class="mt-2">
    <x-input-label for="password" :value="__('Password')" />

    <div class="relative">
        <x-text-input id="password" class="block mt-1 w-full pr-10"
            type="password"
            name="password"
            required
            autocomplete="new-password"
            placeholder="Password">
        </x-text-input>
        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" Title="Show Password"></span>
    </div>
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

<!-- Confirm Password -->
<div class="mt-2">
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

    <div class="relative">
        <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
            placeholder="Confirm Password">
        </x-text-input>
        <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password" Title="Show Password"></span>
    </div>
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

        <div class="flex items-center justify-center mt-4">
            

            <x-primary-button class="mx-5">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        

                    
        <div class="d-flex items-center justify-center mt-4"> 
             <p>Already I have an account?  &nbsp;</p>
                <a class=" text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Log in') }}
            </a>
       
        </div>


    </form>
</x-guest-layout>


    </x-app-layout>

    <script>
 document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.toggle-password').forEach(function(icon) {
            icon.addEventListener('click', function() {
                var passwordField = document.querySelector(this.getAttribute('toggle'));
                if (passwordField.getAttribute('type') === 'password') {
                    passwordField.setAttribute('type', 'text');
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                } else {
                    passwordField.setAttribute('type', 'password');
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                }
            });
        });
    });
</script>

    </body>
</html>