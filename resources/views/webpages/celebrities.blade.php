<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Celebrities</title>
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<style>
    @media screen and (max-width: 767px) {
         .card {
            max-width:20rem; /* Hide the mobile rating display on larger screens */
        }
        #celebrit-page .card-face--back .card-body p{
            font-size: 14px !important;
        }
        
    }
     @media screen and (min-width: 768px) {
        .card {
            max-width:75rem; /* Hide the mobile rating display on larger screens */
        }
        #celebrit-page .card-face--back .card-body p{
            font-size: 16px !important;
        }
        
    }





    
</style>
</head>
<body>
<x-app-layout>




<div class="container" id="celebrit-page">

    <div class="row mt-2 mx-0">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box">
                <h2 class="text-center font-semibold">Computing Heroes</h2>
                <p class="text-md text-center my-2">Here are programming heroes celebrated for their fame in the realms of IT and computing.</p>
            </div>
    </div>




    <div class="row mt-0  d-flex justify-content-center clearfix" >
        @if($celebrities->isNotEmpty())
        @foreach ($celebrities as $celebrity)
            <div style="cursor: pointer;"   class="col-xl-3 col-lg-4 col-md-6 col-sm-6  d-flex justify-content-center ">
                <div class="scene scene--card ">
                    <div class="card"  id="card">
                        <!--front-->
                        <div class="card-face card-face--front">
                            <!--card body-->
                            <div class="card-body" >
                                <!--card image-->
                                <div class="card_img">
                                    <img src="{{ asset('storage/' . $celebrity->image_path) }}" alt="img-celebrities" class=" img-fluid profile-img ">
                                </div>
            
                                <!--card footer-->
                                <div class="card-footer ">
                                    <ul>
                                        <li><h2 class="mb-2 my-2" style="font-size:19px !important; color: #fff !important;">{{ $celebrity->name }}</h2></li>
                                        <li><h3 style="font-size:14px !important; font-weight:300 !important;"> <i class="fa fa-fw fa-star"></i> {{ $celebrity->job }}</h3></li>
                                    </ul>
                                </div>

                            </div><!-- End card body-->
                        
                        </div>

                        <!-- Start card face back-->
                        <div class="card-face card-face--back">

                            <!--card header-->               
                            <div class="card-header" >
                                <ul>
                                    <li><h2 class="mb-2" style="font-size:19px !important; color: #fff !important;">{{ $celebrity->name }}</h2></li>
                                     <li><h3 style="font-size:14px !important; font-weight:300 !important;"> <i class="fa fa-fw fa-star"></i> {{ $celebrity->job }}</h3></li>
                                </ul>
                            </div>
                            <!--card body-->
                            <div class="card-body">
                                <p class="py-1">{{ $celebrity->description }}</p>
                            </div>
                            <!--card footer-->
                            <div class="card-footer align-self-center">
                                <h4 class=" ">Net worth :   <span>  {{ $celebrity->net }} {{ $celebrity->amount }} USD </span> </h4>              
                            </div>
                    
                        </div><!-- End card face back-->

                    </div><!--End Full card-->
        
                </div><!-- End scene--card -->

            </div><!-- End Col div -->

        @endforeach
        @else
            <div class="text-center my-5">
                <p class="text-center lead">No Celebrities yet</p>
                <img src="{{ asset('storage/pedestrian.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:150px;">
            </div>
    
        @endif
    </div>

</div>















<script>
    // JavaScript function to toggle the flip effect
function toggleFlip(button) {
    const card = button.closest('.flip-card');
    const cardInner = card.querySelector('.flip-card-inner');
    cardInner.classList.toggle('flipped');
}
var cards = document.querySelectorAll('.card');
[...cards].forEach((card)=>{
 
  card.addEventListener( 'click', function() {
    card.classList.toggle('is-flipped');
  });
});
</script>




    </x-app-layout>
</body>



