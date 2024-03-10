<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Course Menu</title>
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
          
      
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/tap.png') }}">
        <style>




 @media screen and (max-width: 767px) {
        .add-display {
            display: none; /* Hide the original rating display on small screens */
        }
        
    }
     @media screen and (min-width: 768px) {
        .add-mobile {
           display: none; /* Hide the original rating display on small screens */
        }
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


        <div class="row mb-1 mt-4 mx-0">
            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box">
                <h2 class="text-center font-semibold">Developer Tools</h2>
                <p class="text-md text-center my-2">A special section for all the tools and websites that developers and designers need</p>
            </div>
        </div>

        <!-- Developers Tools Section -->
        <div class="row">

            @if($deveTools->isNotEmpty())
            @foreach ($deveTools as $deveTool)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6  d-flex justify-content-center ">
                <a href="{{ route('tools.items.new', ['toolId' => $deveTool->id]) }}">
                <div class="card  courseMenu-card" style="width:15rem;">
                    <div class="course-image">
                        <img src="{{ asset('storage/' . $deveTool->image_path) }}" class="card-img-top rounded mt-2 p-2" alt="image">
                    </div>
    
                    <div class="card-body">
                        <h4 class="card-title text-center font-semibold" style="color:#274C77;"><a href="{{ route('tools.items.new', ['toolId' => $deveTool->id]) }}"> {{$deveTool->tool_name}} </a></h4>
                        <hr style="color:#0072BB;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p class="lead text-sm text-center"> <b>{{ $deveTool->deveToolItems->count() }}</b>  {{ $deveTool->deveToolItems->count() !== 0 ? ($deveTool->deveToolItems->count() > 1 ? 'Items' : 'Item') : 'Item' }}</p>
                            </li>
                           
                        </ul>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
            @else
            
            <div class="text-center my-5">
                    
                    <p class="text-center lead">No Developers Tools yet</p>
                    <img src="{{ asset('storage/no-code2.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:150px;">
            </div>
            @endif

        </div>



        <!-- Courses Section -->
        <div class="row  mx-0">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box">
                <h2 class="text-center font-semibold" >Educational Courses</h2>
                <p class="text-md text-center my-2">Explore free courses in topics that interest you.</p>
            </div>
            
        </div>

        <div class="row  mb-5 mt-2 mx-0">
            @if($courses->isNotEmpty())
            @foreach ($courses as $course)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6  d-flex justify-content-center ">
<div class="card courseMenu-card" style="width:30rem;">
<div class="card-header py-2">
    <div class="d-flex align-items-center m-3">
        <div class="user-info mx-2">
            @if ($course->complete == 0)
                <h2 style="font-size:22px !important;">
                    {{$course->course_name}}
                </h2>
            @else
                <a href="{{ route('courses.contnet.new', ['courseId' => $course->id]) }}">
                    <h2 style="font-size:22px !important;">
                        {{$course->course_name}}
                    </h2>
                </a>
            @endif
        </div>
        <div class="rating-display">
            @if ($course->complete == 0)
                <div style="position: absolute; top: 18px; right: 35px;">
                    <div class="course-image p-1" style="width:75px; height:75px;">
                        <img src="{{ asset('storage/' . $course->image_path) }}" class="img-fluid" alt="cover book">
                    </div>
                </div>
            @else
                <div style="position: absolute; top: 18px; right: 35px; ">
                    <a href="{{ route('courses.contnet.new', ['courseId' => $course->id]) }}">
                        <div class="course-image p-1" style="width:75px; height:75px;">
                            <img src="{{ asset('storage/' . $course->image_path) }}" Title="Start learn" class=" img-fluid" alt="cover book">
                        </div>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>


                
                   
                    

    <div class="card-body" >
        
       
        <ul class="list-group list-group-flush">
            

            <li class="list-group-item" style="font-weight:300 !important;"> 
                <p><span id="hourglass" class="fa fa-fw fa-clock"  style="font-weight:300 !important;"></span>
                
               {{ $course->time_long }} {{ $course->time_long > 1 ? 'Hours' : 'Hour' }}</p> 
            </li>
            <li class="list-group-item" style="font-weight:300 !important; ">
                @if ($course->complete == 1)
                   <p style="color:green;"><span class="fa fa-fw fa-check-circle"  style="font-weight:300 !important;"></span>  Completed</p>
                @else
                  <p><span class="fa fa-fw fa-gear spinning"></span>  In Progress</p> 
                @endif
            </li>
            <li class="list-group-item" style="font-weight:300 !important;"  > 
               <p> Level:
                    <span style="color: {{ $course->level === 'Beginner' ? '#0582ca' : ($course->level === 'Intermediate' ? 'red' : 'orange') }};">
                        {{ $course->level }}
                    </span>
                </p>
            </li>
            

<li class="list-group-item " >

@auth
    @if(Auth::user()->role === 'member')
        @php
            $isEnrolled = Auth::user()->enrolledCourses()->where('course_id', $course->id)->exists();
        @endphp
        @if($isEnrolled)
            <!-- If the course is already added by the current user, show a disabled button indicating it's already added -->
            <button type="button" class="btn btn-outline-success btn-sm mt-1  align-self-center w-100" style="font-family: 'Fira Code', monospace;"  disabled>
                <span class="fa fa-fw fa-check-circle " style="font-size: 18px; "></span>&nbsp; Added
            </button>
             
        @else
            
            <div class="add-display">
                <!-- If the course is not added by the current user, show a button to add the course -->
                <form method="POST" action="{{ route('courses.enroll', ['courseId' => $course->id]) }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-primary mt-1  w-100 royal-btn-outline-primary w-100" >
                        Add to your list
                    </button>
                </form>
            </div>

            <div class="add-mobile">
                <!-- If the course is not added by the current user, show a button to add the course -->
                <form method="POST" action="{{ route('courses.enroll', ['courseId' => $course->id]) }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary my-3 w-100 royal-btn-outline-primary w-100">
                        <span class="fa fa-fw fa-plus-circle" ></span>&nbsp;  Add 
                    </button>
                </form>
            </div>
        @endif
    @endif
@endauth  
</li>





        </ul>
    </div>
</div>

            </div>
            @endforeach
            @else
            
            <div class="text-center my-5">
                    
                    <p class="text-center lead">No courses yet</p>
                    <img src="{{ asset('storage/forbidden-sign.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:150px;">
            </div>
            @endif
        </div>
    </div>
</x-app-layout>


</body