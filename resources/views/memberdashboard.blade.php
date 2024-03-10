<head>
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/db676e76a0.js" crossorigin="anonymous"></script>
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
   
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;1,6..12,200;1,6..12,300;1,6..12,400&family=Nunito:wght@200;300;400;500;600&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="{{ asset('storage/tap.png') }}">
<!-- Make sure jQuery is loaded -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<title>CodeFlexi | My Account</title>
<style>
   
@media screen and (max-width: 767px) {
        .rating-display {
            display: none; /* Hide the original rating display on small screens */
        }
       
}

@media screen and (min-width: 767px) {
        .rating-mobile {
            display: none; /* Hide the mobile rating display on larger screens */
        }
        .note-card {
            max-width: 45rem; /* Hide the mobile rating display on larger screens */
        }
}
       
@keyframes heartbeat {
        0% {
            transform: scale(.90);
        }
        50% {
            transform: scale(1.3);
        }
        100% {
            transform: scale(.90);
        }
}

.myNotificationCount {
        display: inline-block;
        background-color: white !important;
        color: #333 !important;
        padding: 4px 10px; /* Add padding for better visibility */
        font-family: 'Montserrat', sans-serif;
}

/* Apply animation only when the count is greater than 0 */
.animated {
        animation: heartbeat .7s infinite;
        background-color: #3e8914 !important;
        color:white !important;
        line-height: 31px;
        width: 40px;
        height: 40px;
        font-size: 25px;
        border-radius: 50% !important;
        
        
}

/* Styles for count 0 */
.countZero {
    background-color: white !important;
    color: blue !important;
    width: 40px;
    height: 40px;
    font-size: 25px;
    border-radius: 50% !important;
    text-align: center;
    line-height: 32px;
}
.header_items_box{
border: 1px solid #FF6347;

}
.header_items_box h2{
     color: #FF6347 ;
    font-size:25px;
    font-family: 'Roboto', sans-serif;
    font-weight:500; 
    
}
.header_items_box h2:hover{
    color: #fb8033 ;
    
}

    </style>
</head>

<body>

<x-app-layout>
<!-- Primary Navigation (Desktop) -->
<div class="container">

  <!-- Alert for success and error message -->
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

    <!-- Responsive Navigation (Mobile) -->

    <div class="row mx-0">

                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  header_items_box">
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ url('/dashboard') }}" >
                            <h2 class="text-left font-semibold">
                                 <span class="fa fa-fw fa-sliders" style="font-size: 24px;"></span>
                                {{ __('Dashboard') }}
                            </h2>
                        </a>
                    
                    @else
                        <a href="{{ url('/memberdashboard') }}" >
                            <h2 class="text-left font-semibold">
                                <span class="fa fa-fw fa-sliders" style="font-size: 24px;"></span>
                                {{ __('Account Dashboard') }}</h2>
                        </a>
                    @endif
                    
                </div>
    </div>

  

</div>


        



<div class="container">
           
    <!-- Notifications Section -->
    <div class="row mt-4 mx-0">

        <button id="notificationsToggleButton" class="toggle-button d-flex justify-content-start align-items-center py-3 position-relative">
            <span class="fa fa-fw fa-bell" style="font-size: 24px;"></span>
                Show Notifications

            <div class="notificationCount">
                <!-- Initial count, replace this with your actual count variable -->
                <span class="myNotificationCount {{ $notifications->count() > 0 ? 'animated' : 'countZero' }}" style="background-color:white; color:#333 !important;">
                    {{ $notifications->count() }}
                </span>
            </div>
        </button>

        <div id="notificationsSection" style="display: none;">
    
        @if($notifications->isEmpty())
        <div class="text-center my-3">
            
            <img src="{{ asset('storage/remove.png') }}" alt="no-items" class="rounded mx-auto d-block m-4" style="width: 110px;">
            <h3 class="text-center" style="font-weight:400 !important;"> <b>No notifications yet.</b> </h3>
            <p class="text-center">When you get notifications, they'll show up here</p>
            <a href="{{ url('/memberdashboard') }}">
                        <button type="button" class="btn btn-outline-primary my-3 w-50 royal-btn-outline-primary"><span class="fa fa-fw fa-rotate-right " style="font-size: 15px; "></span> Refresh </button>
                </a>
        
        </div>
        @else
        @foreach($notifications->sortByDesc('created_at') as $notification)
            <div class="card">
                <div >
                    @if($notification instanceof App\Models\Post)
                        <!-- <p>New post created by </p> -->
                        <div class="d-flex align-items-center" >
                            <div class="user-info mx-2">
                                <div style="width: 55px; height: 55px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('storage/newpost.gif') }}" alt="no-items" class="rounded mx-auto d-block m-4" style="width: 110px;">
                                </div>
                            </div>
                            <div class="user-details my-2">
                                <h3  style="font-size: 18px !important; font-weight: 300 !important; color: #333; "><b style="font-size: 18px !important;color: #FF6347 ;">{{ $notification->user->name }}</b> has been created new post on Blog.</h2>
                            </div>
                            <div class="rating-display">
                                <div style="position: absolute; top: 12px; right: 12px; border-radius: 2px; background-color: #2980b9;">
                                    <p style="color: #fff; font-size: 11px; " class="px-1">
                                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif($notification instanceof App\Models\Feedback)
                        <!-- <p>New feedback created by </p> -->
                        <div class="d-flex align-items-center">
                            <div class="user-info mx-2">
                                <div style="width: 55px; height: 55px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('storage/newfeedback.gif') }}" alt="no-items" class="rounded mx-auto d-block m-4" style="width: 110px;">
                                </div>
                            </div>
                            <div class="user-details my-2">
                                <h3  style="font-size: 18px !important; font-weight: 300 !important; color: #333; ">New feedback created by <b style="font-size: 18px !important;color: #FF6347 ;">{{ $notification->user->name }}</b></h3>
                            </div>
                            <div class="rating-display">
                                <div style="position: absolute; top: 12px; right: 12px; border-radius: 2px; background-color: #2980b9;">
                                    <p style="color: #fff; font-size: 11px; " class="px-1">
                                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif($notification instanceof App\Models\Course)
                        <!-- <p>Admin created new course called ""</p> -->
                        <div class="d-flex align-items-center">
                            <div class="user-info mx-2">
                                <div style="width: 55px; height: 55px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('storage/newcourse.gif') }}" alt="no-items" class="rounded mx-auto d-block" style="width: 110px;">
                                </div>
                            </div>
                            <div class="user-details my-2">
                                <h3  style="font-size: 18px !important; font-weight: 300 !important; color: #333; ">Admin created a new course called <b style="font-size: 18px !important;color: #FF6347 ;" >{{ $notification->course_name }}</b></h3>
                            </div>
                            <div class="rating-display">
                                <div style="position: absolute; top: 12px; right: 12px; border-radius: 2px; background-color: #2980b9;">
                                    <p style="color: #fff; font-size: 11px; " class="px-1">
                                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                       @elseif($notification instanceof App\Models\Comment)
                        <!-- <p>Admin created new course called ""</p> -->
                        <div class="d-flex align-items-center">
                            <div class="user-info mx-2">
                                <div style="width: 55px; height: 55px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('storage/comment.gif') }}" alt="no-items" class="rounded mx-auto d-block" style="width: 110px;">
                                </div>
                            </div>
                            <div class="user-details my-2">
                                <h3  style="font-size: 18px !important; font-weight: 300 !important; color: #333; "><b style="font-size: 18px !important;color: #FF6347 ;">{{ $notification->user->name }}</b> has been commented on your post "<b>{{ $notification->post->title }}</b>".</h3>
                            </div>
                            <div class="rating-display">
                                <div style="position: absolute; top: 12px; right: 12px; border-radius: 2px; background-color: #2980b9;">
                                    <p style="color: #fff; font-size: 11px; " class="px-1">
                                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                       @elseif($notification instanceof App\Models\CommentReply)
                        <!-- <p>Admin created new course called ""</p> -->
                        <div class="d-flex align-items-center">
                            <div class="user-info mx-2">
                                <div style="width: 55px; height: 55px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('storage/reply.gif') }}" alt="no-items" class="rounded mx-auto d-block" style="width: 110px;">
                                </div>
                            </div>
                            <div class="user-details my-2">
                                <h3  style="font-size: 18px !important; font-weight: 300 !important; color: #333; "><b style="font-size: 18px !important;color: #FF6347 ;">{{ $notification->user->name }}</b> has been replied on your comment on "<b style="font-size: 18px !important;color: #FF6347 ;">{{ $notification->comment->post->title }}</b>" post.</h3>
                            </div>
                            <div class="rating-display">
                                <div style="position: absolute; top: 12px; right: 12px; border-radius: 2px; background-color: #2980b9;">
                                    <p style="color: #fff; font-size: 11px; " class="px-1">
                                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>




    <!-- my notes Section -->
    <div class="row mt-4 mx-0">

        <button id="myNotestoggleButton" class="toggle-button d-flex justify-content-start py-3">
            <span class="fa fa-fw fa-list" style="font-size: 24px;"> </span>&nbsp; 
            Show My Notes
        </button>
        <div id="myNotesSection" style="display: none;" class="pt-4">
            

            
            @if($userNotes->isNotEmpty())
            
            @foreach($userNotes as $note)
            <div class="card mb-3" style="max-width: 45rem; border-color:#3498DB;">
                
                    <div class="user-info py-3 px-4">
                        <h3  style="font-weight:400 !important; color: #000; ">Note: {{ $note->title }}</h3>
                    </div>
                    <div   style="position: absolute; top: 11px; right: 20px; ">
                    <form method="POST" action="{{ route('notes.destroy', ['note' => $note->id]) }}" class="my-1" onsubmit="return confirm('Are you sure you want to delete this note?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm p-2 text-lg">
                            <span class="fa fa-fw fa-trash text-md"></span> 
                        </button>
                    </form>
                    </div>

                <hr style="margin:0px 20px ">
                <div class="card-body px-4">
                    
                    <p class="pt-1" style="font-weight:400 !important; font-size: 18px !important;">{{ $note->content }}</p>
            
            <hr style="margin:20px 0px ">
            
                    @php
                        $noteDate = \Carbon\Carbon::parse($note->created_at);
                        $currentTime = \Carbon\Carbon::now();
                        $isToday = $noteDate->isToday();
                        $isYesterday = $noteDate->isYesterday();
                    @endphp

                    @if($isToday)
                        @if($noteDate->diffInMinutes($currentTime) < 60)
                            <span style="color:#495057; font-size: 14px;">
                                <span class="fa fa-fw fa-check-circle" style="font-size: 14px; color:green;"></span> <b style="font-size: 14px; color:green;">Just Now</b>
                            </span>
                        @else
                            <span class="text-sm mb-0" style="font-size: 14px; color:green;">{{ \Carbon\Carbon::parse($noteDate)->diffForHumans() }} </span>
                        @endif
                    @elseif($isYesterday)
                        
                        <span class="text-sm mb-0" style="font-size: 14px; color:green;">{{ \Carbon\Carbon::parse($noteDate)->diffForHumans() }}</b>  </span>
           
                    @else
                            <span style="color:#495057; font-size: 14px;">Created on </span>
                            <span class="text-sm mb-0" style="font-size: 13px; ">{{ $noteDate->isoFormat('MMM, D, YYYY') }} at {{$noteDate->format('h:i A') }}
                            </span>
                    @endif
                   
                <div>
                
            </div>
        </div>
        </div>
        <hr class="my-2">
        @endforeach
        @else
        <div class="text-center mb-2">
            
            <img src="{{ asset('storage/no_notes.gif') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:130px;">
            <h3 class="text-center" style="font-weight:400 !important;"> <b>You don't have notes yet</b> </h3>
            <p class="text-center  mb-4">Try to add some notes to help you in future,</p>
           
        </div>
        @endif

            <div class="card note-card mb-4"  style="border:none;">
                <div class="card-body">
                  
                    <form action="{{ route('notes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label for="noteTitle" class="mt-2">Note Title:</label>
                        <input type="text" id="noteTitle" name="noteTitle" required>

                        <div class="form-group mt-2">
                            <label for="noteContent">Note Content:</label>
                            <textarea class="form-control mt-1 mb-3" id="noteContent" name="noteContent" required></textarea>
                        </div>
                        <button type="submit" class="btn royal-btn-outline-primary btn-submit-feedback mt-3">Insert Note</button>
                    </form>
                </div>
            </div>


    </div>
</div>
















<!-- Posts details -->
<div class="row mt-4 mx-0">

<button id="toggleButton"  class="toggle-button d-flex justify-content-start align-items-center py-3 position-relative">
    <span class="fa fa-fw fa-comments" style="font-size: 24px;"> </span>&nbsp;
    Show My Posts 
    
    <div class="notificationCount" style="background-color:white; color:#333;">
        {{$userPostCount}}
    </div>
</button>

<div id="postsSection" style="display: none;">
  <!-- Display all Posts -->
@if($userPosts->isNotEmpty())
    
    @php
        // Sort the posts by creation date in descending order
        $sortedPosts = $userPosts->sortByDesc('created_at');

    @endphp

    @foreach($sortedPosts as $post)
        <div class="card my-4" style="max-width: 45rem;">

<div class="card-header">
      
    <div class="d-flex align-items-center">
    

        <div class="d-flex align-items-start my-1 ms-1 ">
           <div class="user-info ">
                        <div style="width: 40px; height: 40px; border-radius: 10%; background-color: {{ $post->user->color ?? '#000' }}; display: flex; justify-content: center; align-items: center; font-size: 20px; color: white;">
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
                            <h5><div>{{ $postDate->isoFormat('MMM, D, YYYY') }} at {{ $postDate->format('h:i A') }}</div></h5>
                    @endif
            </div>
          
        </div>
        <div class="mt-1">
         
        <div class="rating-display">
            <!-- Delete post -->
            <form method="POST" action="{{ route('posts.postDestroy', ['post' => $post->id]) }}" style="position: absolute; top: 15px; right: 20px;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger remove-btn-outline-danger btn-sm py-2" style=" height: 43px !important;"> <span class="fa fa-fw fa-trash" style="font-size: 20px;"></span> </button>
            </form>

            <!-- Edit post -->
            <div  style="position: absolute; top: 14px; right: 85px;">
                <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn royal-btn-outline-primary btn-sm py-2" ><span class="fa fa-fw fa-edit" style="font-size: 20px;"></span> Edit </a>
            
            </div>
       </div>
       <div class="rating-mobile">
           <form method="POST"   action="{{ route('posts.postDestroy', ['post' => $post->id]) }}" style="position: absolute; top: 12px; right: 15px;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger remove-btn-outline-danger btn-sm py-2"> <span class="fa fa-fw fa-trash" style="font-size: 20px;"></span> </button>
            </form>
            <!-- Edit post -->
            <div style="position: absolute; top: 12px; right: 70px;">
            <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn royal-btn-outline-primary btn-sm py-2" ><span class="fa fa-fw fa-edit" style="font-size: 20px;"></span> </a>
        </div>
        
       </div>





            
         
            </div>
     


    </div>
</div>





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
                                                    <div style="width: 40px; height: 40px; border-radius: 10%; background-color: {{ $comment->user->color ?? '#000' }}!important; display: flex; justify-content: center; align-items: center; font-size: 20px; color: white;">
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
                                                    <button type="submit" class="btn btn-outline-danger remove-btn-outline-danger btn-sm p-1 text-md"  Title="Remove Reply">
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
                                                    <button type="submit" class="btn btn-outline-danger remove-btn-outline-danger btn-sm p-1 text-md" Title="Remove Comment">
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
                                                    <button type="submit" class="btn  royal-btn-outline-primary fb-comment-btn ms-1 p-0" id="replyButton" >
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
   
            
             <div class="text-center mb-2">
            
                <img src="{{ asset('storage/no_posts.gif') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:130px;">
                <h3 class="text-center mb-3" style="font-weight:400 !important;"> <b>You don't have posts on Blog yet</b> </h3>
                
        </div>
@endif
               
               
</div>
</div>










<!-- Feedbacks details -->
            <div class="row mt-4 mx-0">

    


<button id="feedbacktoggleButton"  class="toggle-button d-flex justify-content-start align-items-center py-3 position-relative">
    <span class="fa fa-fw fa-star" style="font-size: 24px;"></span> &nbsp;
    Show My Feedbacks 
    
    <div class="notificationCount" style="background-color:white; color:#333;">
        {{$userFeedbackCount}}
    </div>
</button>









<div id="feedbacksSection" style="display: none;">

<!-- Display all feedbacks -->
    @if($userFeedbacks->isNotEmpty())
        @php
        // Default sorting by descending order of 'created_at'
        $sortedFeedbacks = $userFeedbacks->sortByDesc('created_at');
        @endphp
   
    @foreach($sortedFeedbacks as $feedback)
        <div class="card mb-4 feedback-card" style="max-width: 45rem; box-shadow:none;border:none;">

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

            <div style="position: absolute; top: 10rem; right: 35px;">
                <form method="POST" action="{{ route('feedbacks.feedbackDestroy', ['feedback' => $feedback->id]) }}" class="my-3 " onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-outline-danger remove-btn-outline-danger btn-sm pt-1 "> <span class="fa fa-fw fa-trash text-sm" Title="Remove Feedback" ></span>  </button>
               </form>
            </div>
        <div>
            
               
        </div>
    </div>
</div>
</div>
@endforeach
       
@else
      <div class="text-center mb-2">
            
                <img src="{{ asset('storage/no_feedbacks.gif') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:130px;">
                <h3 class="text-center mb-3" style="font-weight:400 !important;"> <b>You don't have feedback yet</p>
                
        </div>
@endif
            




</div>
 </div>









  <!-- My tasks Section -->
<div class="row mt-4 mx-0">





    <button id="userTasktoggleButton" class="toggle-button d-flex justify-content-start py-3">
        <span class="fa fa-fw fa-check" style="font-size: 24px;"> </span>&nbsp; 
    Show All Completed Tasks</button>

    <div id="userTaskSection" style="display: none;">
    
    

@if ($completedTasks->isNotEmpty())
<div class="table-responsive mt-3">
    <table class="table">
        <thead>
            <tr>
                <th>Task Title</th>
                    <th>Course Title</th>
                    <th>Finished Data</th>
                    <th>Action</th>
                <!-- Other columns -->
            </tr>
        </thead>
        <tbody>
@foreach ($completedTasks as $completedTask)
    <tr>
        <td>
            
            <a href="{{ route('tasks.task.new', ['courseId' => $completedTask->course->id]) }}" >
                               {{ $completedTask->task_title }}
            </a>
        </td>
        <td>
            <a href="{{ route('courses.contnet.new', ['courseId' => $completedTask->course->id]) }}">
            {{ $completedTask->course->course_name }}
            </a>
        </td>
        <td>
            @php
                $completionTime = $completedTask->completedBy()->where('user_id', Auth::user()->id)->first()->pivot->created_at ?? null;
            @endphp
            @if ($completionTime)
            {{ $completionTime->isoFormat('MMM, D, YYYY') }} at {{ $completionTime->format('h:i A') }}
                
            @endif
        </td>
        <td>
            <form method="POST" action="{{ route('tasks.delete', ['taskId' => $completedTask->id]) }}" onsubmit="return confirm('Are you sure you want to delete this Task?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach


        </tbody>
    </table>
  </div>
   @else
       
        

       <div class="text-center mb-2">
            
                <img src="{{ asset('storage/no_task.gif') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:130px;">
                <h3 class="text-center mb-3" style="font-weight:400 !important;"> <b>No completed tasks yet</p>
                
        </div>
    @endif



    </div>


</div>










 <!-- my courses Section -->
<div class="row my-4 mx-0">

    <button id="myCoursestoggleButton" class="toggle-button d-flex justify-content-start py-3"><span class="fa fa-fw fa-graduation-cap" style="font-size: 24px;"> </span>&nbsp; Show My Courses</button>

    <div id="myCoursesSection" class="mb-3" style="display: none;">
    

    @if ($courseenrolled->isNotEmpty())
<div class="table-responsive mt-3 mb-2">
    <table class="table">
        <thead>
            <tr>
                    <th></th>
                    <th>Course Title</th>
                    <th>Course Situation</th>
                    <th>Data</th>
                    <th>Action</th>
                <!-- Other columns -->
            </tr>
        </thead>
        <tbody>
@foreach ($courseenrolled as $coursedone)
    <tr>
        <td>
             @if ($coursedone->complete == 0)
                
                    <div class="course-image p-1" style="width:50px; height:50px;">
                        <img src="{{ asset('storage/' . $coursedone->image_path) }}" class="img-fluid" alt="cover book">
                    </div>
               
            @else
                <a href="{{ route('courses.contnet.new', ['courseId' => $coursedone->id]) }}" >
                   
                   
                    <div class="course-image p-1" style="width:50px; height:50px;">
                        <img src="{{ asset('storage/' . $coursedone->image_path) }}" class="img-fluid" alt="cover book">
                    </div>
                
                   
            </a>
            @endif
                    
             
        </td>
        <td>
            @if ($coursedone->complete == 0)
                
                    {{$coursedone->course_name}}
               
            @else
                <a href="{{ route('courses.contnet.new', ['courseId' => $coursedone->id]) }}" >
                   
                   
                    {{$coursedone->course_name}}
                
                   
            </a>
            @endif
            
        </td>
        <td> 
           @if ($coursedone->complete == 1)
                   <p style="color:green;"><span class="fa fa-fw fa-check-circle"></span>  Completed</p>
                @else
                   <span class="fa fa-fw fa-gear spinning"></span>  In Progress
                @endif
        </td>
        <td>
            @php
                $enrollmentTime = $coursedone->enrolledByUsers()->where('user_id', Auth::user()->id)->first()->pivot->created_at ?? null;
            @endphp
            @if ($enrollmentTime)
                {{ $enrollmentTime->isoFormat('MMM, D, YYYY') }} at {{ $enrollmentTime->format('h:i A') }}
            @endif
        </td>
        <td>
            <form method="POST" action="{{ route('courses.unenroll', ['courseId' => $coursedone->id]) }}" onsubmit="return confirm('Are you sure you want to unenroll from this course?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Unenroll</button>
            </form>
        </td>
    </tr>
@endforeach



        </tbody>
    </table>
  </div>
   @else
        <p></p>
         <div class="text-center my-3">
           <p class="text-center lead">No courses added yet.</p>
           <img src="{{ asset('storage/newcourse.gif') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:110px;">
           <a href="{{ route('course.menu') }}" style="color:#219ebc;">Add new Course</a> Or <a href="{{ route('quiz') }}" style="color:#008000;">Take a quiz</a> for course recommendations.
      </div>
    @endif

    


    </div>
</div>


















</div>

















 




















            


            




















 












          

            </div>
        </div>
    </x-app-layout>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   


<script>




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
$(document).ready(function() {






    // Replace this line with your actual logic to get the notification count
        var notificationCount = parseInt($(".myNotificationCount").text());

        // Add or remove classes based on the count
        if (notificationCount > 1) {
            $(".myNotificationCount").addClass("animated");
        } else if (notificationCount === 0) {
            $(".myNotificationCount").addClass("countZero");
        }












// For Users Section
    $("#userTasktoggleButton").click(function() {
        $("#userTaskSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-check" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show All Completed Tasks';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide All Completed Tasks");
        } else {
            $(this).html(icon + newText);
        }
    });

    
    $("#myNotestoggleButton").click(function() {
        $("#myNotesSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-list" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show My Notes';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide My Notes");
        } else {
            $(this).html(icon + newText);
        }
    });
$("#myCoursestoggleButton").click(function() {
        $("#myCoursesSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-graduation-cap" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show My Courses';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide My Courses");
        } else {
            $(this).html(icon + newText);
        }
    });
    

$("#toggleButton").click(function() {
    $("#postsSection").slideToggle();

     var currentText = $(this).text().trim();
    var icon = '<span class="fa fa-fw fa-comments" style="font-size: 24px;"> </span>&nbsp;';
    var $posts = '<div class="notificationCount" style="background-color:white ; color:blue;">' +
    '{{ $userPostCount }}' +
    '</div>';

    

    if (currentText.includes("Show")) {
        $(this).html(icon + "Hide My Posts" + $posts);
    } else if (currentText.includes("Hide")) {
        $(this).html(icon + "Show My Posts" + $posts);
    }


});

   $("#feedbacktoggleButton").click(function() {
    $("#feedbacksSection").slideToggle();

     var currentText = $(this).text().trim();
    var icon = '<span class="fa fa-fw fa-star" style="font-size: 24px;"></span>&nbsp;';
    var $notifications = '<div class="notificationCount" style="background-color:white ; color:blue;">' +
    '{{ $userFeedbackCount }}' +
    '</div>';

    var currentText = $(this).text().trim();

    if (currentText.includes("Show")) {
        $(this).html(icon + "Hide My Feedbacks" + $notifications);
    } else if (currentText.includes("Hide")) {
        $(this).html(icon + "Show My Feedbacks" + $notifications);
    }
});



 $("#notificationsToggleButton").click(function() {
        $("#notificationsSection").slideToggle();

        var currentText = $(this).text().trim();
        var icon = '<span class="fa fa-fw fa-bell" style="font-size: 24px;"></span>&nbsp;';
        var $notifications = $('#notificationCountContainer');

        if (currentText.includes("Show")) {
            $(this).html(icon + "Hide Notifications");
            $notifications.slideDown();
        } else if (currentText.includes("Hide")) {
            $(this).html(icon + "Show Notifications");
            $notifications.slideUp();
        }
    });

    // Check if two hours have passed since login, then hide the notification count
    var loggedInTime = '{{ session('login_time') }}'; // Get the login time from the server

    if (loggedInTime) {
        var twoHoursAgo = new Date(loggedInTime);
        twoHoursAgo.setHours(twoHoursAgo.getHours() + 2); // Change this back to 2 hours
        var currentTime = new Date();

        if (currentTime > twoHoursAgo) {
            $('#notificationCountContainer').hide();
        } else {
            $('#notificationCountContainer').show();
        }
    }
});















function toggleComments(postId) {
        var commentsDiv = document.getElementById('comments_' + postId);
        var toggleBtn = document.querySelector(`[data-target="#comments_${postId}"]`);

        if (commentsDiv.style.display === 'none' && toggleBtn.innerText.includes('Show')) {
            commentsDiv.style.display = 'block';
            toggleBtn.innerHTML = toggleBtn.innerHTML.replace('Show', 'Hide');
        } else {
            commentsDiv.style.display = 'none';
            toggleBtn.innerHTML = toggleBtn.innerHTML.replace('Hide', 'Show');
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

</script>



</body>

