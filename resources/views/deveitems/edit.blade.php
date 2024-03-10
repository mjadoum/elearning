<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Edit</title>
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
    .card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.user-info {
  display: flex;
  align-items: center;
}

.user-info h2 {
  margin-left: 10px; /* Adjust spacing between icon and text */
}

@media screen and (max-width: 767px) {
         .card {
            max-width:20rem; /* Hide the mobile rating display on larger screens */
        }
        .rating-display {
            display: none; /* Hide the original rating display on small screens */
        }
    }
     @media screen and (min-width: 768px) {
        .card {
            max-width:45rem; /* Hide the mobile rating display on larger screens */
        }
        .rating-mobile {
            display: none; /* Hide the mobile rating display on larger screens */
        }
    }
</style>
    </head>
    <body >
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

    <div class="container">
    <div class="row mt-4">
<!-- Alert for success message -->
@if(session('success'))
<div class="alert alert-success" id="Alert">
    {{ session('success') }}
</div>
@endif
    </div>
</div>
             <h3 class="display-5 text-center">Edit Developer Tool Item Page</h3>









<div class="container">
    <div class="row mt-4 mb-4">

 @auth
            @if(in_array(Auth::user()->role, ['member', 'admin']))


    <div class="card " >
      
                <div class="card-body ">
                    <h5 class="card-title mb-4">Edit Form</h5>
<form method="POST" action="{{ route('deveitem.update', ['deveitem' => $toolitem->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')


<div class="form-group mb-3">
    <label for="tool" class="mb-2">Choose Developers tool:</label>
    <select class="form-control" id="tool" name="tool">
        <option value="">Select Developer tool</option>
        @foreach ($deveTools as $deveTool)
            <option value="{{ $deveTool->id }}" {{ $toolitem->devetool_id == $deveTool->id ? 'selected' : '' }}>
                {{ $deveTool->tool_name }}
            </option>
        @endforeach
    </select>
</div>

    <!-- Developer tool item Name -->
    <label for="itemName" class="mt-2">Developer tool item Name:</label>
    <input type="text" id="itemName" name="itemName" value="{{ $toolitem->item_name }}" required>

        <!-- Famous Job Input -->
    <div class="form-group">
        <label for="itemType" class="">Developer tool item type:</label>
        <input type="text" id="itemType" name="itemType" value="{{ $toolitem->item_type }}" required>
    </div>
    <!-- Developer tool item Description Input -->
    <div class="form-group">
        <label for="itemDescription">Developer tool item description:</label>
        <textarea class="form-control mt-1 mb-3" id="itemDescription" name="itemDescription" >{{ $toolitem->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="itemLink">Developer tool item link:</label>
        <input type="text" id="itemLink" name="itemLink" value="{{ $toolitem->link }}" required>
    </div>

    <!-- Image Input (if applicable) -->
    <div id="drop-area" class="drop-area mt-4">
        <input type="file" id="image" name="image" style="display: none;" onchange="displayFileName()" />
        <label class="button" for="image">Choose file</label>
        <div class="text-md mt-2" id="file-name">To upload image file here</div>
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>     

    <!-- Current Image Preview (if applicable) -->
    @if($toolitem->image_path)
        <img src="{{ asset('storage/' . $toolitem->image_path) }}" class="img-fluid p-4" alt="Current Image">
        
    @endif

    <!-- Submit Button -->
    <button type="submit" class="btn btn-outline-primary mt-2">Update Post</button>
    <!-- Cancel Button -->
    <a href="javascript:history.go(-1);" class="btn btn-outline-danger mt-2 ml-2">Cancel</a>
</form>



   </div>


</div>
 

</div>

 @endauth
            @endif

</x-app-layout>
</body













