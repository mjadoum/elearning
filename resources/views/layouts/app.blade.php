<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/tap.png') }}">
    </head>
    <body class="font-sans antialiased">
    
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>



        
<footer class="bg-dark p-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 order-md-1 text-center text-md-left mb-3 mb-md-0">
                <p class="text-white text-center text-sm mb-0">Made With Love By Mustafa Jadoun © <span id="year-display"></span></p>
            </div>
            <div class="col-md-6 order-md-2 text-center text-md-right">
                <div class="social">
                
                <a target="_blank" href="https://www.youtube.com/@codeflexi"><span class="fa fa-fw fa-youtube"></span></a>
                <a target="_blank" href="https://www.facebook.com/codeflexi"><span class="fa fa-fw fa-facebook"></span></a>
                <a target="_blank" href="https://github.com/codeflexi"><span class="fa fa-fw fa-github"></span></a>
                <a target="_blank" href="https://twitter.com/code_flexi"><span class="fa fa-fw fa-twitter"></span></a>
  </div>
            </div>
        </div>
    </div>
</footer>


    <script>
     const currentDate = new Date();
    const currentYear = currentDate.getFullYear();
    // You can use this 'currentYear' variable anywhere in your HTML

    // For example, displaying it in a specific div
    document.getElementById('year-display').innerHTML = currentYear;
    </script>
    </body>
</html>
