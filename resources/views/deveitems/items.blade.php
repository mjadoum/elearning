<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | {{$tool->tool_name}}</title>
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
            color:#0072BB !important;
            
        }
        .course-image{
            width:50%; 
           
           
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
            position: absolute; top: 15px;  right:0px; width:83%;
        }

        .course-image{
            width:17%; 
             
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

        <div class="row mb-1 mt-4 mx-0">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 " >
           <p class="return-path">
                <span class="fa fa-fw fa-home" style="font-size: 21px;"></span>&nbsp;-&nbsp;
                <a href="{{ route('course.menu') }}" style="color:#219ebc;">Developer Tools</a> <span style="color:#333 !important;font-weight:500;">/</span> 
                
            </p>
                <div class="header_items_box">
                    <h2 class="text-center font-semibold">{{$tool->tool_name}}</h2>
                    <p class="text-md text-center my-2">{{$tool->tool_description}}</p>
                </div>

                
            </div>
        </div>

        <div class="row mb-5">
            @if($items->isNotEmpty())
            @foreach ($items as $item)
           
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto  ">


            <div class="card  item-card">
                    <div class="card-header">
                        <div class="course-image mt-1">
                            <a href="{{$item->link}}" target="_blank"><img src="{{ asset('storage/' . $item->image_path) }}" class="img-fluid p-2" alt="tool_item"></a>
                        </div>
                        <div class="rightDetails my-4 px-3 ">
                            <ul>
                                <li><h3 class="itemName "><a href="{{$item->link}}" target="_blank">{{$item->item_name }}</a></h3></li>
                                <li><p class=" ">{{ $item->item_type }}</p></li>
                            </ul>
                        </div>
                    </div>
                    
    
                    <div class="card-body">               
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h4 class="card-title">Description:</h4>
                                <p> {{ $item->description }}</p>
                            </li>
                        
                           
                        </ul>
                    </div>
                </div>











            </div>
            @endforeach
             @else
             <div class="text-center mb-5">
                    
                    <p class="text-center lead">No developers tools items yet</p>
                    <img src="{{ asset('storage/empty.gif') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:150px;">

                    
            </div>
            
            @endif
        </div>






</div>













</x-app-layout>
</body>
