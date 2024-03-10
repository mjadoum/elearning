<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Home</title>
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

        <style>
           .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        width: 90%; /* Adjust the width as needed */
        max-width: 600px; /* Set a maximum width */
    }
    .card h2 {
       font-weight:600;
       font-size:25px;
       padding: 10px 0px 20px 0px;
    }
    .card h4 {
       font-weight:600;
       font-size:19px;
       padding: 10px 0px;
    }
    .card a {
       font-weight:600;
       color:blue;
    }
    .card button{
       font-weight:600;
       color:red;
       padding: 4px;
    }
        </style>

    </head>
    <body >
    <x-app-layout>




<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
     <h2 class="text-lg text-center mt-2 mb-4">Log in to your account</h2>

    <div class="text-right mb-2">
        <p id="helpLink" style="color: blue; font-size: 14px; padding: 7px; cursor: pointer;">Need help?</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Password')" />

            
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Password">
                </x-text-input>
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-2">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="d-flex items-center justify-center mt-4">
            <x-primary-button class="mx-5">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="d-flex items-center justify-center mt-4"> 
             <p>Don't have an account?  &nbsp;</p>
                <a class=" text-md text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('Sign Up') }}
                </a>
       
        </div>
    </form>
       <!-- Overlay Card -->
    <div id="overlay" class="overlay" style="display: none;">
        <div class="card">
            <div class="card-body">
                <!-- Add your help information here -->
                <h2>Help with Logging in</h2>
                <h4>Which email address should I use?</h4>
                <p>You need to use the email associated with your CodeFelxi account. </p>
                <h4>I'm new to the website</h4>
                <p>You'll need to digitally  <a href="{{ route('register') }}">{{ __('Sign Up') }}</a> before logging in. </p>
                <h4>I can' log in </h4>
                <p>You may have an older account so you'll need to  <a href="{{ route('register') }}">{{ __('Sign Up') }}</a> first. </p>
                <!-- Close button positioned at top-right corner -->
            <button id="closeOverlayBtn" class="mt-3" style="position: absolute; top: 30px; right: 30px;">
                <span class="fa fa-fw fa-close"></span>&nbsp;Close
            </button>
            </div>
        </div>
    </div>
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

           // JavaScript to handle overlay visibility
    document.getElementById('helpLink').addEventListener('click', function() {
        document.getElementById('overlay').style.display = 'flex';
    });

    document.getElementById('closeOverlayBtn').addEventListener('click', function() {
        document.getElementById('overlay').style.display = 'none';
    });


    });
</script>
    </body>
</html>