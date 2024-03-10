<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Feedback</title>
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
     @media screen and (max-width: 767px) {
        .rating-display {
            display: none; /* Hide the original rating display on small screens */
        }
        .feedback-form{
            width: 100% !important;
        }

    }
     @media screen and (min-width: 768px) {
        .rating-mobile {
            display: none; /* Hide the mobile rating display on larger screens */
        }
        .rating-stars{
            margin-left:10rem !important;
        }
        .feedback-form{
            padding: 0px 30px;
        }





    }
    .custom-toggle-btn {
        
        text-align: center !important;
        color: #6096BA;
        padding: 15px;

    }
     
    
    
</style>
    </head>
    <body id="feedbackPage">
        <x-app-layout>



<div class="container">

    <div class="row mt-4">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  align-self-center">
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
    </div>

</div>




<div class="container">

    <!-- Feedback Form -->
    @auth
        @if(in_array(Auth::user()->role, ['member', 'admin']))
            <div class="row mx-0">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box">
                    <h2 class="text-center font-semibold">Give feedback </h2>
                    <p class="text-md text-center my-2">Your thoughts are valuable in helping improve our website.</p>
                </div>
            </div>
</div>
<div class="container">
            <div class="row ">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  align-self-center">
                    <div class="card feedback-form" style="max-width: 45rem; border:none; box-shadow:none; border-radius:10px;">
                        <div class="card-body">
                            <h3 class="card-title text-center"></h3>
                            <p class="card-text mb-4 text-center"></p>
                            <form method="POST" action="{{ route('feedback.store') }}">
                            @csrf
                            <div class="form-group mb-4">
                               

                                <div class="rating-stars  ms-5" id="starsForm">
	                                <input type="radio" name="rating" id="rs0" value="0" checked><label for="rs0"></label>
	                                <input type="radio" name="rating" id="rs1" value="1"><label for="rs1"></label>
	                                <input type="radio" name="rating" id="rs2" value="2"><label for="rs2"></label>
	                                <input type="radio" name="rating" id="rs3" value="3"><label for="rs3"></label>
	                                <input type="radio" name="rating" id="rs4" value="4"><label for="rs4"></label>
	                                <input type="radio" name="rating" id="rs5" value="5"><label for="rs5"></label>
	                                <span class="rating-counter ms-5"> / 5 </span>
                                </div>
                            </div>

                            <label for="feedbackTitle" class="mb-1">Add a headline:</label>
                            <input type="text" class="mb-4" id="feedbackTitle" name="title" placeholder="What's most important to know?" required>

                            <div class="form-group">
                                <label for="feedbackMessage" class="mb-1">Add a written feedback:</label>
                                <textarea class="form-control mb-3" id="feedbackMessage" name="message" placeholder="Let us know what's on your mind"></textarea>
                            </div>

                            <button type="submit" class="btn btn-outline-primary my-3 w-100 royal-btn-outline-primary">Send Feedback</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <hr class="mt-4">
        @endif

    @endauth
        

    <!-- overall rating box -->
    <div class="row mt-4">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  align-self-center">

            <div class="card p-2" style="max-width: 45rem; border:none;  box-shadow: 0 5px 16px 0 rgba(52, 152, 219, 0.2);">
                <div class="card-body mb-1 mt-0">
        
                    <div class="rating text-center">
                        <h3 class="text-center" style=" font-size:25px;font-weight:500 !important;color:#1385d1 !important;">Overall summary rating </h3>
                        <hr class="my-3">
                        <h2>
                        @php
                            $fullStars = floor($averageRating); // Number of full stars
                            $hasHalfStar = $averageRating - $fullStars >= 0.5; // Check for half star
                        @endphp

                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $fullStars) <!-- Display full gold stars -->
                                <span class="fa fa-fw fa-star" style="color: gold; font-size: 30px;"></span>
                            @elseif ($hasHalfStar && $i - $fullStars === 1) <!-- Display half gold star -->
                                <span class="fa fa-fw fa-star-half" style="color: gold; font-size: 30px;"></span>
                            @else <!-- Display dark gray star -->
                                <span class="fa fa-fw fa-star" style="color: darkgray; font-size: 30px; font-weight: 400;"></span>
                            @endif
                        @endfor
                        </h2>
                    </div>
                    <h3 class=" text-center p-1" style="color:#A9A9A9; font-size:30px;"><b style="color: gold;">{{ number_format($averageRating, 1) }}</b> out of 5</h3>
                    <hr class="my-2">
                    <p class="text-center" style="font-size:19px;font-family: 'Roboto', sans-serif;">Based on <b>{{ $feedbacksCount }}</b> Reviews</p>
                </div>
            </div>

        </div>
    </div>

    <!-- title  -->
<hr class="mt-4">
<div class="row mt-4">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-0 align-self-center">
            <!-- Display all feedbacks -->
            @if($feedbacks->isNotEmpty())
            
            <h3 class="text-center mb-4" style=" font-size:25px;font-weight:500 !important;color:#1385d1 !important;"> All Members Reviews</h3>
        <div>

        <div class="col-12 d-flex justify-content-center mx-0">

            <div class="text-center d-flex justify-content-center mb-4" >
                <div class="dropdown" style="width: 16rem; "> 
                <button class="btn w-100 tomato-btn-outline-primary dropdown-toggle " style="font-size:16px !important;" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Sorted by {{ !request()->has('sort') || request()->sort === 'new' ? 'New' : 'Old' }} Feedbacks
                </button>
                <ul class="dropdown-menu" aria-labelledby="sortDropdown" style="width: 16rem ;font-size:15px !important; font-family: 'Fira Code', monospace;">
                    <li><a class="dropdown-item" href="{{ route('feedback', ['sort' => 'new']) }}">New Feedbacks</a></li>
                    <li><a class="dropdown-item" href="{{ route('feedback', ['sort' => 'old']) }}">Old Feedbacks</a></li>
                </ul>
                </div>
            </div>
            @php
                // Default sorting by descending order of 'created_at' (newest first)
                $sortedFeedbacks = $feedbacks->sortByDesc('created_at');
    
                // Check if a specific sorting option is selected
                if(request()->has('sort') && request()->sort === 'old') {
                    $sortedFeedbacks = $feedbacks->sortBy('created_at'); // Sort by old
                }

                $today = now()->format('Y-m-d');
                $yesterday = now()->subDay()->format('Y-m-d');
                $currentMonth = null;
            @endphp
        </div>

        <div class="col-12 d-flex justify-content-center mx-0">
            @foreach($sortedFeedbacks as $feedback)
                 @php
                    $feedbackDate = \Carbon\Carbon::parse($feedback->created_at);
                    $feedbackDateString = $feedbackDate->format('Y-m-d');
                    $feedbackMonth = $feedbackDate->format('F Y');
                @endphp

                @if($feedbackDateString == $today)
                    @if($loop->first)
          
                    <h3 class="  d-flex justify-content-center mt-3" style="color: green; font-size: 18px;">
                       ---------- Recent reviews ---------- 
                    </h3>
                    @endif
                @elseif($feedbackDateString == $yesterday)
                    @if($loop->first)
           
                    <h3  class="  d-flex justify-content-center  my-2" style="color: green; font-size: 18px;">
                       ---------- Recent reviews  ----------
                    </h3>
                    @endif
        
                @elseif($feedbackMonth != $currentMonth)
        
       
                    <h3 class="  d-flex justify-content-center  mt-1 mb-2" style="color: #3498DB; font-size: 18px;">
                        ---------- Reviews on {{ $feedbackDate->format('F Y') }} ----------
                    </h3>
                @php
                    $currentMonth = $feedbackMonth;
                @endphp
                  
                @endif

        </div>

        <div class="col-12  mx-0">
        
        <div class="card  mb-4 feedback-card" style="max-width: 45rem; box-shadow:none;border:none;">

        <div class="card-header mx-0" style="background-color:none !important;">
            <div class="user-info m-2">
                <div style="width: 40px; height: 40px; border-radius: 10%; background-color: {{ $feedback->user->color ?? '#000' }}; display: flex; justify-content: center; align-items: center; font-size: 20px; color: white;">
                    {{ strtoupper(substr($feedback->user->name, 0, 1)) }}
                </div>
                <div class="user-details">
                    <h3  style="font-size: 18px; font-weight: 400 !important; color: #000; " >{{ $feedback->user->name }} 
                            @if($feedback->user->role == 'admin')
                        
                                -  <b>{{ $feedback->user->role }}</b>

                            @endif
                        
                    </h3>
                </div>
            </div>
            <div class="rating">
                <h2 class="rating-display">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $feedback->rating)
                            <span class="fa fa-fw fa-star" style="color: gold; font-size: 20px; "></span>
                        @else
                            <span class="fa fa-fw fa-star" style="color: darkgray; font-size: 20px; font-weight: 400;"></span>
                        @endif
                    @endfor
                </h2>
                <h2 class="rating-mobile">
                   
                        <span class="fa fa-fw fa-star" style="color: gold; font-size: 21px !important;"></span>
                        <span style="font-size: 18px !important;">{{ $feedback->rating }} /  5</span>
                        
                    
                </h2>
            </div>
        </div>
        <hr style="margin:0px 30px ">                
        <div class="card-body">
            <h3 style="font-weight:400 !important; font-size: 20px !important;">{{ $feedback->title }}</h3>
            <p class="pt-2" style="font-weight:400 !important; font-size: 16px !important;">{{ $feedback->message }}</p>
            <br>
            <div class="card-footer">
            @php
                $feedbackDate = \Carbon\Carbon::parse($feedback->created_at);
                $currentTime = \Carbon\Carbon::now();
                $isToday = $feedbackDate->isToday();
                $isYesterday = $feedbackDate->isYesterday();
            @endphp

            @if($isToday)
                @if($feedbackDate->diffInMinutes($currentTime) < 60)
                    <span style="color:#495057; font-size: 14px;">
                        <span class="fa fa-fw fa-check-circle" style="font-size: 14px; color:green;"></span> <b style="font-size: 14px; color:green;">Just Now</b>
                    </span>
                @else
                    <span style="color:#495057; font-size: 14px;">Reviewed from</span>
                    <span class="text-sm mb-0" style="font-size: 14px; color:green;">{{ \Carbon\Carbon::parse($feedbackDate)->diffForHumans() }} </span>
                @endif
            @elseif($isYesterday)
                   <span style="color:#495057; font-size: 14px;">Reviewed from</span>
                    <span class="text-sm mb-0" style="font-size: 14px; color:green;">{{ \Carbon\Carbon::parse($feedbackDate)->diffForHumans() }}</b>  </span>
           
            @else
                    <span style="color:#495057; font-size: 14px;">Reviewed on </span>
                    <span class="text-sm mb-0" style="font-size: 13px; ">{{ \Carbon\Carbon::parse($feedback->created_at)->isoFormat('MMM, D, YYYY') }} at {{ \Carbon\Carbon::parse($feedback->created_at)->format('h:i A') }}
                    </span>
            @endif
            </div>
        </div>
</div>
@endforeach

        @else
        
        
        @endif
        </div>


        </div>

</div>




</x-app-layout>

</body