<head>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!--Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;1,6..12,200;1,6..12,300;1,6..12,400&family=Nunito:wght@200;300;400;500;600&display=swap" rel="stylesheet">
        <!--CSS Link -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!--JS Link -->
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/tap.png') }}">
        <style>
            .user-name {
    white-space: nowrap;
    font-size:17px;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 150px; /* Set a maximum width as needed */
    display: inline-block;
    vertical-align: middle;
}
.navbar-placeholder {
    height: 80px; /* Change this value to match your navbar height */
}

/* Add styling for the fixed-top navbar */
.navbar.fixed-top + .navbar-placeholder {
    display: block;
}

/* Hide the placeholder when the navbar is not fixed */
.navbar:not(.fixed-top) + .navbar-placeholder {
    display: none;
}
/* Add your CSS styles here */
    .scrolled {
       
        border-bottom: 1px solid black;
    }
        </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar-placeholder"></div>
    <nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-light  fixed-top" id="navbar">
        <div class="container py-2">
            <!-- Brand -->
<a class="navbar-brand" href="/">
    <img src="{{ asset('storage/logo.svg') }}" class="img-fluid" style="width: 160px; height: auto;" alt="...">
</a>

            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                     <li class="nav-item">
                        <a class="nav-link{{ request()->routeIs('course.menu') ? ' active' : '' }}" href="{{ route('course.menu') }}">Learn now</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link{{ request()->routeIs('community') ? ' active' : '' }}" href="{{ route('community') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link{{ request()->routeIs('celebrities') ? ' active' : '' }}" href="{{ route('celebrities') }}">IT Heroes</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link{{ request()->routeIs('feedback') ? ' active' : '' }}" href="{{ route('feedback') }}">Reviews</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link{{ request()->routeIs('about') ? ' active' : '' }}" href="{{ route('about') }}">About us</a>
                    </li>

                </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                     @if (Route::has('login'))
                        @auth

                     <li class="nav-item dropdown  loginorsignup">
    <!-- User Name Button -->
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="display: flex; justify-content: center; align-items: center;">
        <div style="display: flex; align-items: center;">
            <div style="width: 32px; height: 32px; border-radius: 50%;padding-top:3px; background-color: {{ Auth::user()->color ?? '#000' }};font-family: 'Montserrat', sans-serif;  font-size: 18px; color: white; margin-right: 10px; display: flex; justify-content: center;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <span style="font-weight:300 !important;">{{ Auth::user()->name }} &nbsp;</span>
        </div>
    </a>
    
    <!-- Dropdown Menu -->
    <ul class="dropdown-menu dropdown-menu-end mb-2 w-100" aria-labelledby="navbarDropdown" >
        <li > 
            @if(Auth::user()->role === 'admin')
            <a class="dropdown-item" href="{{ url('/dashboard') }}" class="nav-link">Admin Dashboard</a>
            @else
            <a class="dropdown-item" href="{{ url('/memberdashboard') }}" class="nav-link"> <span class="fa fa-fw fa-user"></span> My Account</a>
            @endif
        </li>
        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><span class="fa fa-fw fa-gear"></span> Profile Setting</a></li>
        <li>
            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item" style="color: red !important;">
                    <span class="fa fa-fw fa-power-off" style="color: red !important;"></span> Logout
                </button>
            </form>
        </li>
    </ul>
</li>
                    @else
<!-- Authentication Links -->

<!-- Authentication Links -->
<li class="nav-item   ms-lg-4 px-2" style="display: flex; justify-content: center;">
    <a class="text-center nav-link{{ request()->routeIs('login') ? ' active' : '' }}" href="{{ route('login') }}"> Log in</a>
</li>
<!-- Authentication Links -->
<li class="nav-item loginorsignup ms-lg-1 px-2" style="display: flex; justify-content: center;">
   @if (Route::has('register'))
    <a class="nav-link" href="{{ route('register') }}" style="color: white !important; font-weight:500;">Sign up</a>
    @endif
</li>
                   
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

     




</body>
