<head>
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/db676e76a0.js" crossorigin="anonymous"></script>
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
   
     <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;1,6..12,200;1,6..12,300;1,6..12,400&family=Nunito:wght@200;300;400;500;600&display=swap" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/tap.png') }}">
    <title>CodeFlexi | Profile Setting </title>
</head>
<x-app-layout>

<!-- Primary Navigation (Desktop) -->
    <div class="container mt-3">
        <div class="d-flex justify-content-start">
            <!-- Logo -->
            <div>
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="h-9 fill-current text-gray-800" />
                </a>
            </div>
            <!-- Navigation Links -->
            <div class="d-none d-sm-flex">
                @if(Auth::user()->role === 'admin')
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                   <h5 style="font-size:32px;">{{ __('Dashboard') }}</h5> 
                </x-nav-link>
                @else
                <x-nav-link :href="route('memberdashboard')" :active="request()->routeIs('dashboard')">
                   <h5 style="font-size:32px;">{{ __('Account Dashboard') }}</h5>
                </x-nav-link>
                @endif
            </div>
        </div>
    </div>

    <!-- Responsive Navigation (Mobile) -->
    <div class="container mt-3 d-sm-none">
        <div x-show="open" class="pt-2 pb-3 ">
            @if(Auth::user()->role === 'admin')
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                 <h5 style="font-size:25px;">{{ __('Dashboard') }}</h5> 
            </x-responsive-nav-link>
            @else
            <x-responsive-nav-link :href="route('memberdashboard')" :active="request()->routeIs('dashboard')">
                 <h5 style="font-size:25px;">{{ __('Account Dashboard') }}</h5>
            </x-responsive-nav-link>
            @endif
        </div>
        <!-- Other Responsive Elements Here -->
    </div>

  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
