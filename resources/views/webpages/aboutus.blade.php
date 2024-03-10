<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | About us</title>
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

    </head>
    <body >
        <x-app-layout>
            <div class="container">
                <div class="row mt-4 mx-0">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  align-self-center">
                    <h2 class="display-4 text-center  d-flex justify-content-start px-sm-3">About CodeFlexi_</h2>
                    <p class="my-3  d-flex justify-content-start "> Come help us build the education the world deserves.</p>
                    <a href="{{ route('course.menu') }}"><button type="button" class="btn btn-outline-primary my-1 w-100 royal-btn-outline-primary">Learn now</button> </a>
                    </div>



                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center  " >
                        <img src="{{ asset('storage/logo.gif') }}" class="img-fluid" style="height:350px; border-radius:50%;" alt="...">
                    </div>
                    
                </div>
                <div class="row mt-4 mx-0">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  ">

                        <h2 class="text-left px-3 font-semibold">Our Purpose:</h2>
                        <p class="my-3 text-justify  px-3" style="text-align: justify; text-justify: inter-word;"> Our platform exists to revolutionize traditional learning methodologies by offering a diverse range of high-quality courses in <b>Web and Mobile Development</b>. We aim to empower learners from all walks of life, providing them with the tools, resources, and support they need to thrive in an ever-evolving digital landscape.</p>
                   
                    </div>



                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  ">
                        
                        <h2 class=" text-left px-3 font-semibold">What Sets Us Apart:</h2>
                         <p class="my-3 text-justify  px-3" style="text-align: justify; text-justify: inter-word;"> What sets us apart is our unwavering commitment to fostering an inclusive and dynamic learning environment. Our platform Emphasis on accessibility, ensuring that knowledge is available to everyone, regardless of background or location. At CodeFlexi, we're not just delivering education; we're igniting passions, unlocking potentials, and paving the way for a brighter future.</p>
                   
                    </div>
                    
                </div>
                <div class="row mt-4 mx-0">
                    
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  ">
                     <h2 class=" text-left px-3 font-semibold">Contact us:</h2>
                    
                     <p class="my-3 px-3" style="text-justify: inter-word;"> Email us on <a href="mailto:info@codeflexi.com">info@codeflexi.com</a></p>
                     <p class="my-3 px-3" style="text-justify: inter-word;"> Phone: +44 20 7123 4567</p>
                   
                    
                   
                    </div>



                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  ">
                     <h2 class="text-left px-3 font-semibold">Our Office</h2>  
                     <p class="my-3  px-3" style=" text-justify: inter-word;"> Location: Scotland / Glasgow </p>  
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2240.0714407597807!2d-4.432897523112664!3d55.844074873118124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48884947b4f43485%3A0xe614ac1e78ab58d5!2sPaisley%20Campus%2C%20University%20of%20the%20West%20of%20Scotland%20(UWS)!5e0!3m2!1sen!2suk!4v1705364983072!5m2!1sen!2suk" width="100%" height="300" style="border: 3px solid #ccc; border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="mb-3 p-2"></iframe>
</div>
                </div>











            </div>
























</x-app-layout>
</body