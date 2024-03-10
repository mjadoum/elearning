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
        <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600&family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300&family=Playfair+Display:ital,wght@0,400;0,500;1,400&family=Raleway:wght@100;200;300;400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100&display=swap" rel="stylesheet">
          
      
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/tap.png') }}">
    <style>
        .signUpForm{
          
            border-radius:2px;
            background-color: #Fff  !important; 
            box-shadow: 5px 6px 32px 2px rgba(52, 152, 219, 0.11);
        }
        .signUpForm h2 {
            font-size:22px;
            text-align:justify;
        }
        .signUpForm p {
            font-size:15px !important;
        }
        form a {
            color:#FF6347;
            text-decoration: underline;
        }
        form a:hover {
            color:#ff4c2b;
        }
        .image-container {
            display: flex;
            justify-content: center;
            width: 100%; /* Set the width of the container */
            height: 500px; /* Set the fixed height for all images */
            overflow: hidden;
        }
        .image-container img {
         object-fit: cover; /* Maintain aspect ratio and cover the container */
        }

    </style>

    </head>
    <body >
    <x-app-layout>

        <div class="container">
            <div class="row mt-4">
                
             
               
                <!-- Alert for success message -->
@if(session('success'))
<div class="alert alert-success" id="Alert">
    {{ session('success') }}
</div>
@endif

<!-- Alert for error message -->
@if(session('error'))
<div class="alert alert-danger" id="Alert">
    {{ session('error') }}
</div>
@endif
            </div>

<div class="row mt-4">

<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12  d-flex justify-content-center   align-self-center">


     <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="image-container">
        <img src="{{ asset('storage/slide_1.png') }}" class="d-block img-fluid" alt="...">
      </div>
    </div>
    <div class="carousel-item">
      <div class="image-container">
        <img src="{{ asset('storage/slide_2.png') }}" class="d-block img-fluid" alt="...">
      </div>
    </div>
    <div class="carousel-item">
      <div class="image-container">
        <img src="{{ asset('storage/slide_3.png') }}" class="d-block img-fluid" alt="...">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>





    </div>
    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12   align-self-center">



       @auth
    @if(Auth::user()->role == 'admin')
        <!-- Display admin-specific content and link to the dashboard -->
        <h2 class="mb-3">Welcome, nice admin!</h2>
        <h3>Go to the dashboard to check or add new content by navigating to the dashboard page.</h3>
        <br>
        <a href="{{ route('dashboard') }}" class="btn btn-primary w-100 orange-btn-outline-primary">Go to Dashboard</a>

    @elseif(Auth::user()->role == 'member')
        <!-- Display member-specific content and link to course menu -->
        <h2 class="mb-3">Welcome <b style="font-family: 'Fira Code', monospace;">{{ Auth::user()->name }}</b></h2>
        <h3>Now, You can start learning programming languages with <b>CodeFlexi</b> for free.</h3>
        <br>
       <a href="{{ route('course.menu') }}" class="btn btn-primary w-100 orange-btn-outline-primary d-flex align-items-center justify-content-center">
            <span class="fa fa-fw fa-play-circle" style="font-size: 22px; font-weight: 300;"></span>&nbsp; Start Learn
       </a>
    @endif
@endauth





        
       @guest
       
    <form method="POST" action="{{ route('register') }}" class="signUpForm p-4">
        @csrf
        <h3 class="text-center my-3"><img src="{{ asset('storage/logo.svg') }}" class="img-fluid  mx-auto  mb-3" style=" width:150px; height:auto;" alt="..."> Join to begin your learning journey.</h3>

        <!-- Name -->
        <div>
           <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-2">
           <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter Email Address" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

<!-- Password -->
<div class="mt-2">
   
<x-input-label for="password" :value="__('Password')"  />
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
   
    <div class="relative">
        <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
            placeholder="Re-Password">
        </x-text-input>
        <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password" Title="Show Password"></span>
    </div>
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
</div>

        <div class="flex items-center justify-center mt-4">
            

            <button type="button" class="btn btn-outline-primary my-1 w-100 mx-5 royal-btn-outline-primary">
                {{ __('Sign up') }}
            </button>
        </div>
        

                    
        

<p class="my-2 " style="width:100%;">By signing up for CodeFlexi, you agree to CodeFlexi's  <a href="#" >Terms of Service</a>  & <a href="#">Privacy Policy</a>.</p>


    </form>

    
@endguest 
       
    </div>










</div>
<hr class="mt-5">
<div class="row mb-3">

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12  align-self-center">
                <h2>
                    Not sure where to start?
                </h2>
                <p>
                    This short quiz will sort you out. Answer a few simple questions to get personal career advice and course recommendations.
                </p>
                <a href="{{ route('quiz') }}">
                        <button type="button" class="btn btn-outline-primary my-3 w-100 royal-btn-outline-primary">Take a quiz <span class="fa fa-fw fa-arrow-right " style="font-size: 15px; "></span></button>
                </a>
            </div>

            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12  ">
                <img src="{{ asset('storage/quiz.png') }}" class="d-block w-50 mx-auto" alt="...">
            </div>


</div>





           </div> 
     </x-app-layout>

    </body>
</html>
