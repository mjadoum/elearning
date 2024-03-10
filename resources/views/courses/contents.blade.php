<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | {{$course->course_name}}</title>
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
    .header_items_box h3{
        font-weight: 500 !important;
        line-height: 30px;
        color:#0072BB; 
        font-family: 'Roboto', sans-serif;
    }
    .card {
    border: 1px solid #ccc;
    padding: 10px;
    margin: 10px 0;
    border-radius: 1px;
    box-shadow: none !important;
}
b a{
color:#fe9352 !important;
}
b a:hover{
color:#FF6347 !important;
}
.font-semibold {
    font-weight: bold;
}
.skill-ul {
     color:red !important;
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
        .about-width{
            width:100%;
        }
         .with-border {
    border-right:none; /* Adjust the color and style as needed */
    
}
    .top-border{
        margin-top:20px;
        border-top: 1px solid #AFD0E4;
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
        .about-width{
            width:86%;
            text-align:left !important;
        }
        .with-border {
    border-right: 1px solid #AFD0E4; /* Adjust the color and style as needed */
    padding-left: 15px; /* Optional: Adjust the padding for better visual separation */
}
    }
</style>
</head>
<body >
<x-app-layout>




<div class="container">
<!-- Path return course -->
        <div class="row mb-1 mt-4 mx-0">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 " >
                <p class="return-path">
                    <span class="fa fa-fw fa-home" style="font-size: 21px;"></span>&nbsp;-&nbsp;
                    <a href="{{ route('course.menu') }}" style="color:#219ebc;">Courses Menu</a> 
                    <span style="color:#333 !important;font-weight:500;">/ {{$course->course_name}}</span> 
                </p>
            </div>

             <div class="col-12 mt-3" >
                <h2 class=" text-center font-semibold">{{$course->course_name}}</h2>
            </div>

        </div>

<!-- Header Box course -->
        <div class="row mb-1 my-4 mx-0 header_items_box">
        @foreach($courseContents as $content)
            <div class="col-4 text-center align-self-center with-border" >

                <img src="{{ asset('storage/hourglass.gif') }}" class=" text-center card-img-top rounded mt-2 p-1 " style="width:70px;" alt="course-image">
                <h4 class="my-2" style="font-weight:400 !important; font-size:18px; ">
                
                 Total Time:
                </h4 >
                <span  class="text-center"  style=" font-family: 'Fira Code', monospace; font-size:16px;">
                    {{ $content->course->time_long }} {{ $content->course->time_long > 1 ? 'Hours' : 'Hour' }}</p>
                </span>

 

            </div>
            <div class="col-4 text-center align-self-center with-border" >

                    <img src="{{ asset('storage/' . $content->course->image_path) }}" class=" text-center card-img-top rounded mt-2 p-1 " alt="course-image">

            </div>
            <div class="col-4 text-center align-self-center " >


                <img src="{{ asset('storage/stairs.gif') }}" class=" text-center card-img-top rounded mt-2 p-1 " style="width:70px;" alt="course-image">
                <h4 style="font-weight:400 !important; font-size:18px; " class="my-2">
                 Skill Level:
                </h4>
                <span  class="text-center " style=" font-family: 'Fira Code', monospace;font-size:16px;color: {{ $content->course->level === 'Beginner' ? '#0582ca' : ($content->course->level === 'Intermediate' ? 'red' : 'orange') }};">
                        {{ $content->course->level }}
                    </span>



            </div>
        @endforeach
        </div>
 <hr class="mt-4">
<!-- About this course Box -->
        <div class="row mb-1 mt-2 mx-0 ">
           
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 with-border" >
                <h3 class="my-3" style="font-size: 25px;  font-weight: 500 !important;">About this course</h3>
                <p class="about-width">{{$content->introduction}}</p>
            </div>
                
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 " >
                <h3 class="my-3" style="font-size: 25px;  font-weight: 500 !important;">Skills you'll gain</h3>
                <p style="color: blue !important; font-size: 16px;"> {!! $content->what_to_learn !!}</p>
            </div>


        </div>
 <hr class="my-4">
<!-- learn with book Box -->
        <div class="row mb-1 mt-2 mx-0 header_items_box">
           
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 with-border align-self-center" >

                    <h3 class=" mb-1">Learn {{$course->course_name}}</h3>
                    <p class="text-md  about-width " >{{$content->course->course_description}}</p>
                    
                     <hr class="my-3">
                    <h3 class="mt-3 font-semibold">{{$content->course->course_name}} Reference :</h3>
                    <b> <a href="{{$content->resource_link}}" target="_blank"> {{$content->resource_name}} </a> </b>
                   


            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 align-self-center top-border" >
                    
                    <h3 class=" text-center mt-3 ">Course Book</h3>
                    <div class="card " style="width: 14rem; border:none;">
                        <img src="{{ asset('storage/' . $content->book_cover) }}" class="card-img-top mt-0 p-0" alt="cover book">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$content->book_name}}</h5>
                            <ul class="list-group list-group-flush">
                            @auth
                                @if (Auth::user()->role === 'member' || Auth::user()->role === 'admin')
                                    <li class="list-group-item ">
                                        <a href="{{ asset('storage/' . $content->pdf_path) }}" class="btn btn-outline-primary my-1 tomato-btn-outline-primary w-100" download>
                                            <i class="fas fa-arrow-down"></i> Download
                                        </a>
                                    </li>
                                @endif
                            @endauth
                            </ul>
                        </div>
                    </div>      
            </div> 


        </div>
 <hr class="my-4">
<!-- Youtube course  -->
        <div class="row mb-1 mt-2 mx-0 header_items_box">
           

        <h3 class="font-semibold">{{$content->youtube_title}}</h3>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 my-3" >

    
        @auth
            @if (Auth::user()->role === 'member' || Auth::user()->role === 'admin')
                <div class="youtube-embed">
                    <iframe width="100%" height="100%" src="{{ $content->youtube_link }}" frameborder="0" allowfullscreen=""></iframe>
                </div>
            @else
                <p>
                    You do not have the necessary role to view this content.
                </p>
            @endif
        @else
            <p>
                <b><a  href="{{ route('login') }}">
                Login&nbsp; 
            </a></b> to view course tutorial.
        </p>
    @endauth

    </div>


        </div>
 <hr class="my-4">
<!-- Related Courses   -->
        <div class="row mb-5 mt-2 mx-0 header_items_box">
            @foreach($courseContents as $content)
            

            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12  with-border align-self-center" >


            <h3 class=" mb-0">{{$course->course_name}} Assignments: </h3>
           
                    @auth
                        @if ($tasks->count() > 0)
                            @if (Auth::user()->role === 'member' || Auth::user()->role === 'admin')
                                <a href="{{ route('tasks.task.new', ['courseId' => $course->id]) }}">
                                    <b>{{ $tasks->count() }} {{ $tasks->count() > 1 ? 'assignments' : 'assignment' }}</b>
                                </a>
                            @else
                                <b>{{ $tasks->count() }} {{ $tasks->count() > 1 ? 'assignments' : 'assignment' }}</b>
                            @endif
                        @else
                            <b class="mx-4">No assignments</b>
                        @endif
                    @else
                        <b><a  href="{{ route('login') }}">
                            Login
                        </a></b>
                        to view assignments
                    @endauth

            </div>




                    








            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 top-border align-self-center" >
                
                    <h3 class="mt-2">Courses in <span style="color:#fe9352;"> {{ $course->catalog->catalog_name }} </span> </h3>
                    <ul>
                        @foreach ($relatedCourses as $relatedCourse)
                         @if ($relatedCourse->complete == 0)
                            <li >{{ $relatedCourse->course_name }} <em style="font-weight:300 !important;font-size:13px;">- in progress -</em></li>
                        @else
                            <li class="mx-3"> <a href="{{ route('courses.contnet.new', ['courseId' => $relatedCourse->id]) }}" style="color:#219ebc;">{{ $relatedCourse->course_name }}</a> </li>
                        @endif
                        
                            <!-- Add more details as needed -->
                        @endforeach
                    </ul>
               
                
            </div>

            



        </div>











</div>

































        






             
            
            
            
            



           
           
            
            
            @endforeach
                </div>

        </div>

        





</div>













</x-app-layout>
</body>
