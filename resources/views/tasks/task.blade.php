<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Course Assignments</title>
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
    .rightDetails h3{
           
            color:#274C77 !important;
        }
        @media screen and (max-width: 767px) {
         .card {
            max-width:24rem; /* Hide the mobile rating display on larger screens */
        }
        #celebrit-page .card-face--back .card-body p{
            font-size: 14px !important;
        }
        .rightDetails{
            position: absolute; top: 20px; right: 0px; width:60%;
        }
        .rightDetails h3{
            font-size:22px !important;
            color:#274C77 !important;
        }
        .course-image{
            width:40%; 
           
        }
        .course-image img{
           border-radius:20px !important;
             
        }
        
    }
     @media screen and (min-width: 768px) {
        .card {
            max-width:60rem; /* Hide the mobile rating display on larger screens */
        }
        #celebrit-page .card-face--back .card-body p{
            font-size: 16px !important;
        }
        .rightDetails{
            position: absolute; top: 15px;  right: 0px; width:85%;
        }

        .course-image{
            width:15%; 
             
        }
        .course-image img{
           border-radius: 20px;
             
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
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Alert for error message -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
               
    </div>

</div>    



<div class="container">

<!-- Path return course content -->
        <div class="row mb-1 mt-4 mx-0">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 " >
                <p class="return-path">
                    <span class="fa fa-fw fa-home" style="font-size: 21px;"></span>&nbsp;-&nbsp;
                    <a href="{{ route('course.menu') }}" style="color:#219ebc;">Courses Menu</a> 
                    <span style="color:#333 !important;font-weight:500;">/ </span>
                    <a href="{{ route('courses.contnet.new', ['courseId' => $course->id]) }}" style="color:#219ebc;">{{ $course->course_name }}</a>
                    <span style="color:#333 !important;font-weight:500;">/ Assignments</span>
                    
                    
                </p>
            </div>

             <div class="col-12 mt-3" >
                <h2 class=" text-center font-semibold">{{$course->course_name}} Assignments</h2>
            </div>

        </div>

<!-- Assignments cards -->
        <div class="row mb-1 mt-4 mx-0">


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto  ">
                




            @foreach($courseTasks as $courseTask)
                <div class="card item-card mb-4" style="max-width: 45rem;">
                    <div class="card-body">
                        <h3 class="m-3 text-left " style="text-align:left !important; font-weight:400 !important;">{{ $courseTask->task_title }}</h3>
                        <hr>
                        <p class="m-3">{{ $courseTask->task_text }}</p>
                        
                        @if($courseTask->image_path)
                            <img src="{{ asset('storage/' . $courseTask->image_path) }}" class="img-fluid  p-4 " alt="Task Image">
                        @endif



       
                        @auth
                            @if(Auth::user()->role === 'member')
                                @if($courseTask->completedBy()->where('user_id', Auth::user()->id)->exists())
                                    <!-- If the task is completed by the current user, show a disabled button indicating completion -->
                                    <button type="button" class="btn btn-outline-success  align-self-center w-100" style="font-family: 'Fira Code', monospace; border-radius:2px;" disabled>
                                        <span class="fa fa-fw fa-check" style="font-size: 24px;"></span>&nbsp; Completed
                                    </button>
                            @else
                                    <!-- If the task is not completed by the current user, show a button to complete the task -->
                                 <form method="POST" action="{{ route('tasks.complete', ['taskId' => $courseTask->id]) }}">
                        @csrf
                        <button type="submit" class="btn  btn-outline-primary  royal-btn-outline-primary w-100 ">
                            Complete
                        </button>
                    </form>
                @endif
          @endif
@endauth      
      




        </div>
    </div>
@endforeach





            </div>


        </div>







</div>




            
            




</x-app-layout>
</body>
