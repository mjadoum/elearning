<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CodeFlexi | Community</title>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"></script>

      
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/tap.png') }}">
<style>
 @media screen and (max-width: 767px) {
       
        .rating-display {
            display: none; /* Hide the original rating display on small screens */
        }
        .post-form{
            width: 100% !important;
        }
        .stylish-input-group {
            width:100%; /* Adjust the width as needed */
            margin: 0 auto;
        }
        .stylish-input-group button, .stylish-input-group .form-control {
    
            height: 38px !important;
            font-size:16px !important;
            font-family: 'Fira Code', monospace;
        }
        .no-results {
    margin-top: 20px;
    padding: 20px;
    background-color: #f8d7da; /* Light red background color */
    border: 1px solid #f5c6cb; /* Border color */
    border-radius: 5px;
 
    
}
     .no-results p {
   text-align:left !important;
   font-size:16!important;
 
    
}
.no-results h2 {
    text-align:left !important;

}
 }

@media screen and (min-width: 768px) {

        .rating-mobile {
            display: none; /* Hide the mobile rating display on larger screens */
        }
        .stylish-input-group {
           max-width: 45rem;
            margin: 0 auto;
        }
.no-results {
    margin-top: 20px;
    padding: 20px;
    background-color: #f8d7da; /* Light red background color */
    border: 1px solid #f5c6cb; /* Border color */
    border-radius: 5px;
    width: 100%;
    margin:0 auto;
    
}

}   
    
    













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
/* Style for the comment box */
.fb-comment-box {
    display: flex;
    align-items: stretch; /* Ensure both input and button are of equal height */
}

/* Style for the comment input */
.fb-comment-input {
   flex: 1;
    padding-left:20px !important;
    margin-right: 10px;
    font-size:14px !important;
    height:40px; /* Set height to align with the button */
}

/* Style for the comment button */
.fb-comment-btn {
    min-width: 100px; /* Adjust width as needed */
    height:40px; /* Set the same height as the input box */
    font-size:14px;
}

 .card{
    text-align: left !important;
 }
    
    .custom-toggle-btn {
       border-bottom: 2px dotted #3498DB;
        text-align: center !important;
        color:#3498DB;
        cursor: pointer;
        padding-bottom:10px;
        text-align: center !important;
        width: 100%;
        display: flex;
        justify-content: space-between;
        font-family: 'Roboto', sans-serif;
        font-weight:300;
        margin-bottom:230px !important;
        margin:25px auto !important;
        max-width: 45rem; 
       
    }
   
    .custom-toggle-content {
        display: none;
        padding: 10px;
    }
  .custom-toggle-btn  i{
        margin-left:5%;
        
    }
    /* Add this to your CSS file or in a style tag in your HTML */


.stylish-input-group .input-group-addon {
    background: transparent;
    border: none;
}

.stylish-input-group .form-control {
    border: 1px solid #ccc;
    border-right: none;
    border-radius: 4px 0 0 4px;
    height: 50px;
}

.stylish-input-group button {
    background: #007bff;
    color: #fff;
    border: 1px solid #007bff;
    border-radius: 0 4px 4px 0;
    margin-left: -1px;
    height: 50px;
}

/* Add this to your CSS file or in a style tag in your HTML */

.no-results h2 {
    
    color:#721C24;
    Font-weight:500;
    
}
.no-results p {
    margin-bottom: 10px;
    color: #721c24; /* Dark red text color */
}
</style>
    </head>
    <body >
        <x-app-layout>
<div class="container">

    <div class="row mt-4 mx-0">
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


    <!-- Feedback Form -->
            <div class="row mx-0">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box">
                    <h2 class="text-center font-semibold">Search Results for " <b>{{ $query }}</b> " </h2>
                    <p class="text-md text-center my-2"> Here, you can find results for your search or <b style="font-size:16px; text-decoration: underline;"><a href="{{ route('community') }}" >Show all posts</a></b></p>
                </div>
            </div>
</div>



<div class="container">
        
            <!-- Search posts Form -->
            <div class="row my-2 mx-0">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  align-self-center">
                    <form action="{{ route('search') }}" method="GET" class="mb-3">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control" name="q" placeholder="Search for posts..." required>
                            <span class="input-group-addon">
                            <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search" aria-hidden="true"></i> Search
                            </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <hr class="mt-0 mb-4">

            <div class="row mt-1 mx-0">

                <!-- sort posts -->
                <div class="col-12  mx-0">
                    @if($posts->isNotEmpty())

                    <div class="d-flex justify-content-center">
                        <div class="text-center d-flex justify-content-center mb-4">
                            <div class="dropdown" style="max-width: 16rem; "> 
                                <button class="btn w-100 tomato-btn-outline-primary dropdown-toggle " style="font-size:16px !important;" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sorted by {{ !request()->has('sort') || request()->sort === 'new' ? 'New' : 'Old' }} Posts
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="sortDropdown" style="width: 13rem ; font-size:15px !important; font-family: 'Fira Code', monospace;">
                                    <li><a class="dropdown-item" href="{{ route('search', ['sort' => 'new']) }}">New Posts</a></li>
                                    <li><a class="dropdown-item" href="{{ route('search', ['sort' => 'old']) }}">Old Posts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 mx-0 align-self-center">
                    @php
                        // Default sorting by descending order of 'created_at' (newest first)
                        $sortedPosts = $posts->sortByDesc('created_at');

                        // Check if a specific sorting option is selected
                        if(request()->has('sort') && request()->sort === 'old') {
                            $sortedPosts = $posts->sortBy('created_at'); // Sort by old
                        }

                        $today = now()->format('Y-m-d');
                        $yesterday = now()->subDay()->format('Y-m-d');
                        $currentMonth = null;
                    @endphp

                    @foreach($sortedPosts as $post)
                        @php
                            $postDate = \Carbon\Carbon::parse($post->created_at);
                            $postDateString = $postDate->format('Y-m-d');
                            $postMonth = $postDate->format('F Y');
                        @endphp

                    @if($postDate->diffInHours(now()) < 24)
                        @if($loop->first)
                            <div class="custom-toggle-container ">
                                <button class="custom-toggle-btn " style=" border-bottom: 2px dotted green; color:green;" >
                                    Recent posts  <i class="fa fa-chevron-down"></i>
                                </button>
                            <div id="{{ $today }}" class="custom-toggle-content" style="display: block;">
                        @endif
                    @elseif($postDate->diffInDays(now()) == 1)
                        @if($loop->first)
                            <div class="custom-toggle-container ">
                                <button class="custom-toggle-btn " style=" border-bottom: 2px dotted #3498DB; color:#3498DB !important;" onclick="togglePosts('{{ $yesterday }}')">
                                    Recent posts <i class="fa fa-chevron-down"></i>
                                </button>
                                <div id="{{ $yesterday }}" class="custom-toggle-content" style="display: block;">
                        @endif
                    @elseif($postMonth != $currentMonth)
                            </div> <!-- Close previous container -->
                            <div class="custom-toggle-container my-3 ">
                                <button class="custom-toggle-btn " onclick="togglePosts('{{ $postDate->format('F Y') }}')">
                                    Posts on {{ $postDate->format('F Y') }} <i class="fa fa-chevron-down" ></i>
                                </button>
                            <div id="{{ $postDate->format('F Y') }}" class="custom-toggle-content" style="display: block;">
                            @php
                                $currentMonth = $postMonth;
                            @endphp
                    @endif


<div class="card post-card text-dark bg-light mb-3 " style="max-width: 43rem; border:1px solid rgba(52, 152, 219, 0.3);">
            <div class="card-header">
                <div class="d-flex align-items-center my-1 ms-1 ">
                    <div class="user-info ">
                        <div style="width: 40px; height: 40px; border-radius: 10%; background-color: {{ $post->user->color}} !important; display: flex; justify-content: center; align-items: center; font-size: 20px; color: white;">
                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                        </div>
                    </div>
                    @php
                        $postDate = \Carbon\Carbon::parse($post->created_at);
                        $currentTime = \Carbon\Carbon::now();
                        $isToday = $postDate->isToday();
                        $isYesterday = $postDate->isYesterday();

                        $postUpdateDate = \Carbon\Carbon::parse($post->updated_at);
                        $differenceUpdateToPost = $postUpdateDate->diffInHours($postDate);
                        $differenceUpdateToNow = $postUpdateDate->diffInHours($currentTime);
                    @endphp
                     <div class="user-details">

                        <h3  style="font-size: 15px; font-weight: 600; color: #000; margin-bottom:-3px;">{{ $post->user->name }}  
                            @if($post->user->role == 'admin')
                        
                                -  <b>{{ $post->user->role }}</b>

                            @endif
                        </h3>

                        @if($isToday)
                        @if($postDate->diffInMinutes($currentTime) < 1)
                            <h5 style="color:green important;"><span class="fa fa-fw fa-check-circle" ></span>Just Now</h5>
                        @else
                            <h5>{{ \Carbon\Carbon::parse($postDate)->diffForHumans() }} </h5>
                        @endif
                    @elseif($isYesterday)
                            <h5>{{ \Carbon\Carbon::parse($postDate)->diffForHumans() }}</h5>
                    @else
                            <h5 ><div>{{ $postDate->isoFormat('MMM, D, YYYY') }} at {{ $postDate->format('h:i A') }}</div></h5>
                    @endif

                    


                    <!-- Display for the post creation time -->
                      
                    
                    </div>
                    <div class="rating-display">
                        <!-- Edit post -->
                        
                        <!-- Display for the post update time -->
                        @if($differenceUpdateToPost > 0 && $differenceUpdateToNow <= 3)
                        <div  style="position: absolute; top: 18px; right: 20px; border-radius: 30px; border:2px solid #0582ca;padding:0px 5px">
                        <h3 style="color:#0582ca; font-size: 13px;font-weight:500 !important; "><span class="fa fa-fw fa-info-circle" ></span> Post Updated</h3>
                        </div>
                        @else
                        <div  style=" display: none;">
                            
                        </div>
                        @endif
                            
                        
                  </div>
                  <div class="rating-mobile">
                        <!-- Edit post -->
                        
                        @if($differenceUpdateToPost > 0 && $differenceUpdateToNow <= 3)
                        <div  style="position: absolute; top: 15px; right: 20px; border-radius: 30px; background-color: #0582ca; padding:0px 5px" Title="Remove Reply" >
                            <p style="color:white; font-size: 13px; font-family: 'Fira Code', monospace; " class="p-1"><span class="fa fa-fw fa-info-circle " ></span>  Updated</p>
                        </div>
                        @else
                        <div  style=" display: none;">
                            
                        </div>
                        @endif
                        
                  </div>
               </div>
         
                  
                    
        
                    </div>
                   <hr style="margin:0px 20px ">    
            <div class="card-body">
                <h3 style="font-weight:400 !important; font-size: 20px !important;">{{ $post->title }}</h5>
                <p class="pt-1" style="font-weight:400 !important; font-size: 16px !important;">{{ $post->message }}</p>
                <br>

                 @if($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}" class="mb-3" alt="cover book" style="border-radius:2px;">
                 @endif
                <hr>
                
            <p class="text-sm my-2"> {{ $post->commentsCount() }}  {{ $post->commentsCount() > 1 ? 'comments' : 'comment' }}</p>
               @auth
                @if(in_array(Auth::user()->role, ['member', 'admin']))
                <!-- Existing form -->
                <form class="mt-2" method="POST" action="{{ route('comment.store', ['post' => $post->id]) }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="fb-comment-box">
                        <input type="text" class="form-control mb-2 fb-comment-input" id="comment_text" name="comment_text" placeholder="Write a comment" required>
                        <button class="btn  royal-btn-outline-primary fb-comment-btn" id="sendButton" >
                            <i class="fa fa-paper-plane"></i> Comment
                        </button>
                    </div>
                </form>
                @endif
                @endauth
     @if($post->commentsCount()> 0)
                <button onclick="toggleComments({{ $post->id }})" class="toggle-btn m-1 show-comment-toggle" data-toggle="collapse" data-target="#comments_{{ $post->id }}">Show {{ $post->commentsCount() }} {{ $post->commentsCount() > 1 ? 'comments' : 'comment' }} <span class="fa fa-fw fa-chevron-down" style="font-size: 14px;"></span></button>
                <div id="comments_{{ $post->id }}" class="comment-section " style="display: none;">       
                  @auth
            @if(in_array(Auth::user()->role, ['member', 'admin']))   
                <div class="comment-section mt-3 mx-0">
                    
</div>
             @endauth
            @endif
                      <!-- Comments -->
                <div class="comments">
                    @if($post->comments->count() === 0)
                        <p>There are no comments yet.</p>
                    @else
                    @endif 
                        @foreach($post->comments as $comment)
                            <div class="comment">
                                <hr class="my-3">
                                <div class="card mb-2" style="max-width: 40rem; position: relative; border:1px solid rgba(52, 152, 219, 0.3); background-color:rgb(0,114,187 ,0.02) !important; border-radius:2px;">
                                   
                                <div class="card-header">
                                            <div class="d-flex align-items-center my-1 ms-1">
                                                 <div class="user-info">
                                                    <div style="width: 40px; height: 40px; border-radius: 10%; background-color: {{ $comment->user->color}} !important; display: flex; justify-content: center; align-items: center; font-size: 20px; color: white;">
                                                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <div class="user-details " >
                                                        <h3  style="font-size: 14px !important; font-weight: 600; color: #000; margin-bottom:-5px; margin-top:-2px !important;">{{ $comment->user->name }}  

                                                            @if($comment->user->role == 'admin')
                        
                                                                -  <b style="font-size: 14px; color:red;">{{ $comment->user->role }}</b>

                                                            @endif

                                                        </h3>
                                                    @php
                                                        $commentDate = \Carbon\Carbon::parse($comment->created_at);
                                                        $currentTime = \Carbon\Carbon::now();
                                                        $isToday = $commentDate->isToday();
                                                        $isYesterday = $commentDate->isYesterday();
                                                    @endphp

                                                    
                                                    @if($isToday)
                                                        @if($commentDate->diffInMinutes($currentTime) < 1)
                                                             <h5  class=" my-0" ><span class="fa fa-fw fa-check-circle"></span> Just Now</h5>
                                                        @else
                                                             <h5  class=" my-0" >{{ \Carbon\Carbon::parse($commentDate)->diffForHumans() }} </h5>
                                                        @endif
                                                    @elseif($isYesterday)
                                                             <h5  class=" my-0" >{{ \Carbon\Carbon::parse($commentDate)->diffForHumans() }}</h5>
                                                    @else
                                                            <h5 class=" mb-0" > <div >{{ $commentDate->isoFormat('MMM, D, YYYY') }} at {{ $commentDate->format('h:i A') }}</div></h5>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="margin:0px 20px ">
                                    <div class="card-body">
                                        <!-- Comment Text -->
                                        <p  style="font-weight:400 !important; font-size: 16px !important; padding-left:10px;">{{ $comment->comment }}</p>
                
                
                                        @if(count($comment->replies) > 0)
                                        
                                            <button onclick="toggleReplies({{ $post->id }})" class="toggle-btn mt-3 show-reply-toggle" data-toggle="collapse" data-target="#replies_{{ $post->id }}" style="font-size:13px !important;  padding-left:10px; ">Show {{ count($comment->replies) }} {{ count($comment->replies) > 1 ? 'replies' : 'reply' }} <span class="fa fa-fw fa-chevron-down" style="font-size: 13px; font-weight:600 !important;"></span></button>
                                                <div id="replies_{{ $post->id }}" class="reply-section " style="display: none;">  
                                        <!-- Replies for the comment -->
                                        @foreach($comment->replies as $reply)
                                        
                    <div class="reply">
                           <hr style="margin:10px 5px; color:#E74C3C !important; " class=" mb-3 ">
        <div class="card " style="max-width: 35rem; border:1px solid rgba(231,76,60,0.5); border-radius:2px; background-color:rgba(231,76,60,0.03) !important;">
            <div class="card-header">
                <div class="d-flex align-items-center  my-1 ms-1 ">
                        @php
                            $replyingUser = \App\Models\User::find($reply->user_id);
                        @endphp

                    <div class="user-info">
                        <div style="width: 40px; height: 40px; border-radius: 10%; background-color: {{ $replyingUser->color ?? '#000' }} !important; display: flex; justify-content: center; align-items: center; font-size: 20px; color: white;">
                            {{ strtoupper(substr($replyingUser->name, 0, 1)) }}
                        </div>
                    </div>
                    <div class="user-details " >
                        <!-- Fetch the user associated with the user_id -->
                        
                        @if ($replyingUser)
                             
                            <h3  style="font-size: 13px !important; font-weight: 600; color: #000; margin-bottom:-5px; margin-top:-5px !important;">{{ $replyingUser->name }}  

                            @if($replyingUser->role == 'admin')
                        
                            -  <b style="font-size: 13px; color:red;">{{ $replyingUser->role }}</b>

                            @endif

                            </h3>
                        @else
                            <p>User not found</p>
                        @endif
                        @php
                            $replyDate = \Carbon\Carbon::parse($reply->created_at);
                            $currentTime = \Carbon\Carbon::now();
                            $isToday = $replyDate->isToday();
                            $isYesterday = $replyDate->isYesterday();
                        @endphp
                        
                        @if($isToday)
                            @if($commentDate->diffInMinutes($currentTime) < 1)
                                <h5 ><span class="fa fa-fw fa-check-circle"></span><b> Just Now</b></h5>
                            @else
                                <h5>{{ \Carbon\Carbon::parse($replyDate)->diffForHumans() }} </h5>
                            @endif
                        @elseif($isYesterday)
                                <h5 >{{ \Carbon\Carbon::parse($replyDate)->diffForHumans() }}</b> </h5>
                        @else
                                <h5 style="color:#ccc important;"><div >{{ $replyDate->isoFormat('MMM, D, YYYY') }} at {{ $replyDate->format('h:i A') }}</div></h5>
                        @endif

                    </div>
                     <!-- Delete Button -->
                                        @auth
                                            @if (Auth::check() && Auth::user()->id === $reply->user_id)
                                                <form method="POST" action="{{ route('replies.destroy', ['reply' => $reply->id]) }}" style=" position: absolute; top: 25px; right: 25px;  " onsubmit="return confirm('Are you sure you want to delete this reply?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm p-1 text-md" Title="Remove Reply">
                                                        <span class="fa fa-fw fa-trash text-md"></span>
                                                       
                                                    </button>
                                                </form>
                                                @endif
                                                @endauth
                </div>
            </div>
            <hr style="margin:0px 20px; color:#de3522 !important;  ">
            <div class="card-body">
                <!-- Display the reply text -->
                <p  style="font-weight:400 !important; font-size: 15px !important; padding-left:10px;">{{ $reply->reply_text }}</p>
            </div>
        </div>
    </div>

    
@endforeach
</div>

@endif
                                        <!-- Delete Button -->
                                        @auth
                                            @if (Auth::check() && Auth::user()->id === $comment->user_id)
                                                <form method="POST" action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" style=" position: absolute; top: 25px; right: 25px;" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm p-1 text-md" Title="Remove Comment">
                                                        <span class="fa fa-fw fa-trash text-md"></span>
                                                       
                                                    </button>
                                                </form>
                                            @endif
                                        @endauth
                                            @auth
                                            @if(in_array(Auth::user()->role, ['member', 'admin']))
                                            <!-- If the user is not the owner, show reply button -->
                                            <button onclick="toggleReply({{ $comment->id }})" class="toggle-btn" data-comment-id="{{ $comment->id }}" title="Reply">
                                                 <span class="fa fa-fw fa-reply" style="font-size: 18px; position: absolute; top: 30px; right: 75px; color:#0072BB !important;"></span>
                                            </button>
                                            <!-- Reply input field -->
                                            <div id="replyInput_{{ $comment->id }}" class=" reply-input p-3 " style="display: none;">
                                            <hr class="mb-3">
                                                <form method="POST" action="{{ route('comments.reply', ['comment' => $comment->id]) }}" id="replyForm" class="fb-comment-box">
                                                    @csrf
                                                    <div class="form-group w-100">
                                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                        <input type="text" class="form-control mb-2 fb-comment-input  " name="reply_text" style="font-size: 14px !important; font-family: 'Lato', sans-serif !important; " id="replyText" placeholder="Reply to {{ $comment->user->name }}" required>
                                                    </div>
                                                    <button type="submit" class="btn  tomato-btn-outline-primary fb-comment-btn ms-1 p-0" id="replyButton" >
                                                        <i class="fa fa-fw fa-reply"></i> Reply
                                                    </button>
                                                </form>
                                            </div>
                                            @endif
                                            @endauth
                                            
                                            
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                    @endif
                </div>
                </div>
            </div>
        </div>
    @endforeach
@else
            <div class="no-results text-center mt-3">
                <h2 >Hmmm...</h2>
                <p class="text-center">We couldn't find any matches for "<strong>{{ $query }}</strong>"</p>
                <p class="text-center">Try refining your search or <a href="{{ route('community') }}" style="color:blue;">Show All Posts</a> .</p>
                
            </div>
@endif
            </div>
        </div>




























<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function toggleComments(postId) {
        var commentsDiv = document.getElementById('comments_' + postId);
        var toggleBtn = document.querySelector(`[data-target="#comments_${postId}"]`);

        if (commentsDiv.style.display === 'none' && toggleBtn.innerText.includes('Show')) {
            commentsDiv.style.display = 'block';
            toggleBtn.innerHTML = toggleBtn.innerHTML.replace('Show', 'Hide');
            toggleBtn.style.color = '#0072BB';
        } else {
            commentsDiv.style.display = 'none';
            toggleBtn.innerHTML = toggleBtn.innerHTML.replace('Hide', 'Show');
            toggleBtn.style.color = '';
        }
        // Append the chevron icon back after text change
    }

        function toggleReplies(postId) {
        var commentsDiv = document.getElementById('replies_' + postId);
        var toggleBtn = document.querySelector(`[data-target="#replies_${postId}"]`);

        if (commentsDiv.style.display === 'none' && toggleBtn.innerText.includes('Show')) {
            commentsDiv.style.display = 'block';
            toggleBtn.innerHTML = toggleBtn.innerHTML.replace('Show', 'Hide');
        } else {
            commentsDiv.style.display = 'none';
            toggleBtn.innerHTML = toggleBtn.innerHTML.replace('Hide', 'Show');
        }
        // Append the chevron icon back after text change
    }
// JavaScript to toggle reply input field
function toggleReply(commentId) {
    const replyInput = document.getElementById(`replyInput_${commentId}`);
    if (replyInput.style.display === 'none') {
        replyInput.style.display = 'block';
    } else {
        replyInput.style.display = 'none';
    }
}
 function togglePosts(sectionId) {
        var section = document.getElementById(sectionId);
        section.style.display = (section.style.display === 'none') ? 'block' : 'none';
    }

</script>


</x-app-layout>
</body