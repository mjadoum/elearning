
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
    <title>CodeFlexi | Admin Dashboard</title>
    <style>

            .notificationCount, .notificationCountContainer{
        position: absolute;
        top: 50%;
        right: 60px; 
        transform: translateY(-50%); 
        background-color:#FF3B2F;
        width:40px;
        font-size: 25px;
        height:40px; 
        border-radius:50%;
    }
    
     @media screen and (max-width: 767px) {
       
        .rating-display {
            display: none; /* Hide the original rating display on small screens */
        }
    }
     @media screen and (min-width: 768px) {
        .card {
            max-width: 45rem; /* Hide the mobile rating display on larger screens */
        }
        .rating-mobile {
            display: none; /* Hide the mobile rating display on larger screens */
        }
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
    font-size:18px;
    height:50px; /* Set height to align with the button */
}

/* Style for the comment button */
.fb-comment-btn {
    min-width: 100px; /* Adjust width as needed */
    height:50px; /* Set the same height as the input box */
    font-size:18px;
}
    </style>
</head>

<body>

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


<div class="container">





          <!-- Notifications Section -->
    <div class="row mt-4">
  
<!-- Make sure jQuery is loaded -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<button id="notificationsToggleButton" class="toggle-button d-flex justify-content-start align-items-center py-3 position-relative">
    <span class="fa fa-fw fa-bell" style="font-size: 24px;"></span>
    Show Notifications


<div id="notificationCountContainer" style="display: none;">
    <div class="notificationCount">
        {{ $notifications->count() }}
    </div>
</div>
</button>

<div id="notificationsSection" style="display: none;">
    
    @if($notifications->isEmpty())
        <div class="text-center my-3">
            <p class="text-center lead">No notifications yet.</p>
            <img src="{{ asset('storage/no-alarm.png') }}" alt="no-items" class="rounded mx-auto d-block m-4" style="width: 110px;">
        </div>
    @else
        @foreach($notifications->sortByDesc('created_at') as $notification)
            <div class="card">
                <div class="card-header">
                    @if($notification instanceof App\Models\Feedback)
                        <!-- <p>New feedback created by </p> -->
                        <div class="d-flex align-items-center">
                            <div class="user-info mx-2">
                                <div style="width: 50px; height: 50px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('storage/newfeedback.gif') }}" alt="no-items" class="rounded mx-auto d-block m-4" style="width: 110px;">
                                </div>
                            </div>
                            <div class="user-details my-2">
                                <h2 class="mt-1" style="font-size: 18px; font-weight: 400; color: #000;">New feedback created by <b>{{ $notification->user->name }}</b></h2>
                            </div>
                            <div class="rating-display">
                                <div style="position: absolute; top: 17px; right: 12px; border-radius: 4px; background-color: #0582ca;">
                                    <p style="color: white; font-size: 13px; padding: 7px;">
                                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                       @elseif($notification instanceof App\Models\Comment)
                        <!-- <p>Admin created new course called ""</p> -->
                        <div class="d-flex align-items-center">
                            <div class="user-info mx-2">
                                <div style="width: 50px; height: 50px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('storage/comment.gif') }}" alt="no-items" class="rounded mx-auto d-block" style="width: 110px;">
                                </div>
                            </div>
                            <div class="user-details my-2">
                                <h2 class="mt-1" style="font-size: 18px; font-weight: 400; color: #000;"><b>{{ $notification->user->name }}</b> has been commented on your post "<b>{{ $notification->post->title }}</b>".</h2>
                            </div>
                            <div class="rating-display">
                                <div style="position: absolute; top: 17px; right: 12px; border-radius: 4px; background-color: #0582ca;">
                                    <p style="color: white; font-size: 13px; padding: 7px;">
                                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                       @elseif($notification instanceof App\Models\CommentReply)
                        <!-- <p>Admin created new course called ""</p> -->
                        <div class="d-flex align-items-center">
                            <div class="user-info mx-2">
                                <div style="width: 50px; height: 50px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                    <img src="{{ asset('storage/reply.gif') }}" alt="no-items" class="rounded mx-auto d-block" style="width: 110px;">
                                </div>
                            </div>
                            <div class="user-details my-2">
                                <h2 class="mt-1" style="font-size: 18px; font-weight: 400; color: #000;"><b>{{ $notification->user->name }}</b> has been replied on your comment on "<b>{{ $notification->comment->post->title }}</b>" post.</h2>
                            </div>
                            <div class="rating-display">
                                <div style="position: absolute; top: 17px; right: 12px; border-radius: 4px; background-color: #0582ca;">
                                    <p style="color: white; font-size: 13px; padding: 7px;">
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










<!-- Posts details -->
<div class="row mt-4">
<button id="toggleButton"  class="toggle-button d-flex justify-content-start align-items-center py-3 position-relative">
    <span class="fa fa-fw fa-comments" style="font-size: 24px;"> </span>&nbsp;
    Show My Posts 
    
    <div class="notificationCount" style="background-color:white; color:blue;">
        {{$userPostCount}}
    </div>
</button>
<div id="postsSection" style="display: none;">
  <!-- Display all Posts -->
@if($userPosts->isNotEmpty())
    <h3 class="text-center">Admin Posts</h3>


    @php
        // Sort the posts by creation date in descending order
        $sortedPosts = $userPosts->sortByDesc('created_at');

    @endphp

    @foreach($sortedPosts as $post)
        <div class="card text-dark bg-light mb-3" style="max-width: 45rem;">

<div class="card-header">
      
    <div class="d-flex align-items-center">
    

        <div class="d-flex align-items-start">
            <div class="user-info mx-2 mt-2">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background-color: {{ $post->user->color ?? '#000' }}; display: flex; justify-content: center; align-items: center; font-size: 20px; color: white;">
                        {{ strtoupper(substr($post->user->name, 0, 1)) }}
                    </div>
            </div>
            <div class="user-details my-2">
                <h2 class="mt-1" style="font-size: 15px; font-weight:600;">{{ $post->user->name }} - <b style="font-size: 15px; color:#e00656;">{{ $post->user->role }}</b></h2>
                     @php
                        $postDate = \Carbon\Carbon::parse($post->created_at);
                        $currentTime = \Carbon\Carbon::now();
                        $isToday = $postDate->isToday();
                        $isYesterday = $postDate->isYesterday();

                        $postUpdateDate = \Carbon\Carbon::parse($post->updated_at);
                        $differenceUpdateToPost = $postUpdateDate->diffInHours($postDate);
                        $differenceUpdateToNow = $postUpdateDate->diffInHours($currentTime);
                    @endphp

                    <!-- Display for the post creation time -->
                      
                    @if($isToday)
                        @if($postDate->diffInMinutes($currentTime) < 1)
                            <p style="color:green; font-size: 13px;"><span class="fa fa-fw fa-check-circle"></span><b> Just Now</b></p>
                        @else
                            <p style="color:green; font-size: 13px;"><b>{{ \Carbon\Carbon::parse($postDate)->diffForHumans() }}</b></p>
                        @endif
                    @elseif($isYesterday)
                            <p class="text-sm mb-0" style="font-size: 13px;"><b>{{ \Carbon\Carbon::parse($postDate)->diffForHumans() }}</b></p>
                    @else
                            <p class="text-sm mb-0" style="font-size: 13px;">{{ $postDate->isoFormat('MMM, D, YYYY') }} at {{ $postDate->format('h:i A') }}</p>
                    @endif
            </div>
          
        </div>
         <div class="mt-1">
         
        <div class="rating-display">
            <!-- Delete post -->
            <form method="POST" action="{{ route('posts.postDestroy', ['post' => $post->id]) }}" style="position: absolute; top: 20px; right: 20px;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm py-2"> <span class="fa fa-fw fa-trash" style="font-size: 20px;"></span> Delete Post</button>
            </form>

            <!-- Edit post -->
            <div  style="position: absolute; top: 20px; right: 165px;">
                <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-outline-primary btn-sm py-2" ><span class="fa fa-fw fa-edit" style="font-size: 20px;"></span> Edit Post </a>
            
            </div>
       </div>
       <div class="rating-mobile">
           <form method="POST"   action="{{ route('posts.postDestroy', ['post' => $post->id]) }}" style="position: absolute; top: 22px; right: 15px;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm py-2"> <span class="fa fa-fw fa-trash" style="font-size: 20px;"></span> </button>
            </form>
            <!-- Edit post -->
            <div style="position: absolute; top: 22px; right: 70px;">
            <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="btn btn-outline-primary btn-sm py-2" ><span class="fa fa-fw fa-edit" style="font-size: 20px;"></span> </a>
            </div>
       </div>





            
         
            </div>
     


    </div>
</div>





            <div class="card-body">
                <h5 class="card-title font-semibold text-md">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->message }}</p>
                <br>

                 @if($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}" class=" rounded mt-2 p-1 mb-2" alt="cover book">
                 @endif
                <hr>
                
           <p class="text-sm my-1"> <b>{{ $post->commentsCount() }}</b>  {{ $post->commentsCount() > 1 ? 'comments' : 'comment' }}</p>
               
        
                <button onclick="toggleComments({{ $post->id }})" class="toggle-btn" data-toggle="collapse" data-target="#comments_{{ $post->id }}">Show all <b>{{ $post->commentsCount() }}</b> {{ $post->commentsCount() > 1 ? 'comments' : 'comment' }} <span class="fa fa-fw fa-chevron-down" style="font-size: 14px;"></span></button>
                <div id="comments_{{ $post->id }}" class="comment-section " style="display: none;">       
                   
                <div class="comment-section mt-3">
                   <form method="POST" action="{{ route('comment.store', ['post' => $post->id]) }}">
                                @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="fb-comment-box">
                        <input type="text" class="form-control mb-2 fb-comment-input" id="comment_text" name="comment_text" placeholder="Write a comment" required>
                        <button class="btn btn-sm btn-primary fb-comment-btn" id="sendButton" disabled>
                        <i class="fa fa-paper-plane"></i> Send
                        </button>
                    </div>
                    </form>
                </div>
          
                      <!-- Comments -->
                <div class="comments">
                    @if($post->comments->count() === 0)
                        <p>No comments on this post.</p>
                    @else
                        @foreach($post->comments as $comment)
                            <div class="comment">
                                <div class="card text-dark mb-2" style="max-width: 35rem; position: relative;">
                                    <div class="card-header">
                                            <div class="d-flex align-items-center">
                                                <div class="user-info mx-2">
                                                    <div style="width: 40px; height: 40px; border-radius: 50%; background-color: {{ $comment->user->color ?? '#000' }}; display: flex; justify-content: center; align-items: center; font-size: 20px; color: white;">
                                                        {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <div class="user-details my-2">
                                                    <h2 class="mt-1" style="font-size: 15px; font-weight: 600;">
                                                        {{ $comment->user->name }} - <b style="font-size: 15px; color: #e00656;">{{ $comment->user->role }}</b>
                                                    </h2>
                                                    @php
                                                        $commentDate = \Carbon\Carbon::parse($comment->created_at);
                                                        $currentTime = \Carbon\Carbon::now();
                                                        $isToday = $commentDate->isToday();
                                                        $isYesterday = $commentDate->isYesterday();
                                                    @endphp

                                                    
                                                    @if($isToday)
                                                        @if($commentDate->diffInMinutes($currentTime) < 1)
                                                            <p style="color:green; font-size: 13px;"><span class="fa fa-fw fa-check-circle"></span><b> Just Now</b></p>
                                                        @else
                                                            <p style="color:green; font-size: 13px;"><b>{{ \Carbon\Carbon::parse($commentDate)->diffForHumans() }}</b></p>
                                                        @endif
                                                    @elseif($isYesterday)
                                                            <p class="text-sm mb-0" style="font-size: 13px;"><b>{{ \Carbon\Carbon::parse($commentDate)->diffForHumans() }}</b></p>
                                                    @else
                                                            <p class="text-sm mb-0" style="font-size: 13px;">{{ $commentDate->isoFormat('MMM, D, YYYY') }} at {{ $commentDate->format('h:i A') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    <div class="card-body">
                                        <!-- Comment Text -->
                                        <p class="card-text">{{ $comment->comment }}</p>
                @if(count($comment->replies) > 0)
                 <button onclick="toggleReplies({{ $post->id }})" class="toggle-btn" data-toggle="collapse" data-target="#replies_{{ $post->id }}" style="font-size:13px;">Show all <b>{{ count($comment->replies) }}</b> {{ count($comment->replies) > 1 ? 'replies' : 'reply' }} <span class="fa fa-fw fa-chevron-down" style="font-size: 13px;"></span></button>
                <div id="replies_{{ $post->id }}" class="reply-section " style="display: none;">  
                                        <!-- Replies for the comment -->
                                        @foreach($comment->replies as $reply)
                    <div class="reply">
        <div class="card text-dark mb-2" style="max-width: 35rem; position: relative;">
            <div class="card-header">
                <div class="d-flex align-items-center">
                     @php
                            $replyingUser = \App\Models\User::find($reply->user_id);
                        @endphp
                    <div class="user-info mx-2">
                         <div style="width: 40px; height: 40px; border-radius: 50%; background-color: {{ $replyingUser->color ?? '#000' }}; display: flex; justify-content: center; align-items: center; font-size: 20px; color: white;">
                                                        {{ strtoupper(substr($replyingUser->name, 0, 1)) }}
                         </div>
                    </div>
                    <div class="user-details my-2">
                        <!-- Fetch the user associated with the user_id -->
                       

                        @if ($replyingUser)
                            <h2 class="mt-1" style="font-size: 15px; font-weight: 600;">
                                {{ $replyingUser->name }} - <b style="font-size: 15px; color: #e00656;">{{ $replyingUser->role }}</b>
                            </h2>
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
                            @if($commentDate->diffInMinutes($currentTime) < 60)
                                <p style="color:green; font-size: 13px;"><span class="fa fa-fw fa-check-circle"></span><b> Just Now</b></p>
                            @else
                                <p style="color:green; font-size: 13px;"><b>{{ \Carbon\Carbon::parse($replyDate)->diffForHumans() }}</b> </p>
                            @endif
                        @elseif($isYesterday)
                                <p class="text-sm mb-0" style="font-size: 13px;"><b>{{ \Carbon\Carbon::parse($replyDate)->diffForHumans() }}</b> </p>
                        @else
                                <p class="text-sm mb-0" style="font-size: 13px;">{{ $replyDate->isoFormat('MMM, D, YYYY') }} at {{ $replyDate->format('h:i A') }}</p>
                        @endif
                    </div>
                     <!-- Delete Button -->
                                        @auth
                                            @if (Auth::check() && Auth::user()->id === $reply->user_id)
                                                <form method="POST" action="{{ route('replies.destroy', ['reply' => $reply->id]) }}" style=" position: absolute; top: 25px; right: 25px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm p-1 text-md">
                                                        <span class="fa fa-fw fa-trash text-md"></span>
                                                       
                                                    </button>
                                                </form>
                                                @endif
                                                @endauth
                </div>
            </div>
            <div class="card-body">
                <!-- Display the reply text -->
                <p class="card-text">{{ $reply->reply_text }}</p>

            </div>
        </div>
    </div>
    <hr>
@endforeach
</div>

@endif
                                        <!-- Delete Button -->
                                        @auth
                                            @if (Auth::check() && Auth::user()->id === $comment->user_id)
                                                <form method="POST" action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" style=" position: absolute; top: 25px; right: 25px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm p-1 text-md">
                                                        <span class="fa fa-fw fa-trash text-md"></span>
                                                       
                                                    </button>
                                                </form>
                                            @endif
                                        @endauth
                                            
                                            <!-- If the user is not the owner, show reply button -->
                                            <button onclick="toggleReply({{ $comment->id }})" class="toggle-btn " data-comment-id="{{ $comment->id }}">
                                                 <span class="fa fa-fw fa-reply" style="font-size: 18px; position: absolute; top: 28px; right: 75px;"></span>
                                            </button>
                                            <!-- Reply input field -->
                                            <div id="replyInput_{{ $comment->id }}" class="reply-input p-3 my-3" style="display: none;">
                                            <hr>
                                                <form method="POST" action="{{ route('comments.reply', ['comment' => $comment->id]) }}" id="replyForm" class="fb-comment-box">
                                                    @csrf
                                                    <div class="form-group w-100">
                                                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                        <input type="text" class="form-control mb-2 fb-comment-input  " name="reply_text" id="replyText" placeholder="Reply to {{ $comment->user->name }}" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-success fb-comment-btn ms-1 p-0" id="replyButton" disabled>
                                                        <i class="fa fa-paper-plane"></i> Reply
                                                    </button>
                                                </form>
                                            </div>

                                            

                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    @endif
                </div>
                </div>
            </div>
        </div>
    @endforeach
@else
                <div class="text-center my-5">
                    
                    <p class="text-center lead">No Posts available yet</p>
                    <img src="{{ asset('storage/no-speak.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:110px;">
            </div>
@endif
               
               
</div>
</div>
<!-- end row Posts -->







    <!-- start row users -->
    <div class="row mt-3">

<button id="usertoggleButton" class="toggle-button d-flex justify-content-start py-3"><span class="fa fa-fw fa-users" style="font-size: 24px;"> </span>&nbsp; Show all users</button>
<div id="usersSection" style="display: none;">

<p class="py-2">Total Users: {{ $usersCount }}</p>
<br>
<!-- start table users -->
  <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th> <!-- New column for role -->
                <th>Action</th>
                <!-- Other columns -->
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role}}</td> <!-- Display role -->
                    <td>
                        <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}" onsubmit="return confirm('Are you sure you want to delete {{ $user->name }} member?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                    <!-- Other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
  </div>
<!-- end table users -->
 </div>
</div>
<!-- end row users -->


<!-- start row Catalog -->
<div class="row mt-3">

<button id="catalogToggleButton" class="toggle-button d-flex justify-content-start py-3"><span class="fa fa-fw fa-bars" style="font-size: 24px;"> </span>&nbsp; Show Insert New Catalog</button>
<div id="catalogSection" style="display: none;">
@if($catalogs->isNotEmpty())
        <div class="table-responsive mt-3">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Catalog Name</th>
                <th>Catalog Description</th>
                <th>Action</th>
                <!-- Other columns -->
            </tr>
        </thead>
        <tbody>
            @foreach ($catalogs as $catalog)
                <tr>
                    <td>{{ $catalog->id }}</td>
                    <td>{{ $catalog->catalog_name }}</td>
                    <td>{{ $catalog->catalog_description }}</td>
                    <td>
                        <form method="POST" action="{{ route('catalogs.destroy', ['catalog' => $catalog->id]) }}" onsubmit="return confirm('Are you sure you want to delete this catalog?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        <a href="{{ route('catalog.edit', ['catalog' => $catalog->id]) }}" class="btn btn-outline-primary btn-sm py-2 mt-2" >Edit </a>
            
                        </form>
                    </td>
                    <!-- Other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
       <div class="text-center my-3">
           <p class="text-center lead">No catalog data yet</p>
           <img src="{{ asset('storage/no-data.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:110px;">
        </div>
@endif
    <div class="insert_form p-3">
        <h5 class="card-title mb-3">Insert Catalog Form</h5>
    <form action="{{ url("/dashboard/catalog") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="catalogName">Catalog Name:</label>
                <input type="text" id="catalogName" name="catalogName" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="catalogDescription">Catalog Description:</label>
                <textarea class="form-control" id="catalogDescription" name="catalogDescription" placeholder="About the course catalog"></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <input type="submit" value="Insert Catalog" class="btn btn-outline-success">
            </div>
        </div>
    </form>
    </div>


</div>
</div>
<!-- end row Catalogs -->



<!-- start row Course -->
<div class="row mt-3">

<button id="courseToggleButton" class="toggle-button d-flex justify-content-start py-3"><span class="fa fa-fw fa-leanpub" style="font-size: 24px;"> </span>&nbsp; Show Insert New Course</button>
<div id="courseSection" style="display: none;">
@if($courses->isNotEmpty())
        <div class="table-responsive mt-3">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Catalog Title</th>
                <th>Course Description</th>
                <th>level</th>
                <th>Hours</th>
                <th>Complete</th>
                <th>Action</th>
                <!-- Other columns -->
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->catalog->catalog_name  }}</td>
                    <td>{{ $course->course_description }}</td>
                    <td>{{ $course->level }}</td>
                    <td>{{ $course->time_long  }}</td>
                    <td>
                        @if ($course->complete == 1)
                                Completed
                        @else
                                In Progress
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('courses.destroy', ['course' => $course->id]) }}"  onsubmit="return confirm('Are you sure you want to delete this {{ $course->course_name }} course?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                             <a href="{{ route('course.edit', ['course' => $course->id]) }}" class="btn btn-outline-primary btn-sm py-2 mt-2" >Edit </a>
            
                        </form>
                    </td>
                    <!-- Other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
       <div class="text-center my-3">
           <p class="text-center lead">No courses data yet</p>
           <img src="{{ asset('storage/no-data.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:110px;">
        </div>
@endif
<div class="card" >
      
                <div class="card-body">
                    <h5 class="card-title mb-4">Insert Course Form</h5>
<form action="{{ url("/dashboard/course") }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
        <label for="catalog" class="mb-2">Choose Catalog:</label>
        <select class="form-control" id="catalog" name="catalog">
            <option value="">Select Catalog</option>
            @foreach($catalogs as $catalog)
                <option value="{{ $catalog->id }}">{{ $catalog->catalog_name }}</option>
            @endforeach
        </select>
    </div>
    <label for="courseTitle" class="mt-4">Course Title:</label>
    <input type="text" id="courseTitle" name="courseTitle" required>
   
    <div class="form-group">
    <label for="level">Course Level:</label>
    <select class="form-control" id="level" name="level" required>
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediate</option>
    </select>
    </div>

    <div class="form-group">
        <label for="courseDescription"  class="mt-4">Course Description:</label>
        <textarea class="form-control mt-1 mb-3" id="courseDescription" name="courseDescription" ></textarea>
    </div>




    <div class="form-group">
        <label for="timeLong">Time Long (hours):</label>
        <input type="number" class="form-control" id="timeLong" name="timeLong">
    </div>

    <div class="form-check"  >
        <input type="checkbox" class="form-check-input" id="complete" name="complete">
        <label class="form-check-label" for="complete">Course: Completed</label>
    </div>

<div id="drop-area" class="drop-area mt-4" >
    <input type="file" id="image" name="image" style="display: none;" onchange="displayFileName()" />
    <label class="button" for="image">Choose file</label>
    <div class="text-md mt-2" id="file-name">To upload image file here</div>
</div>     

    <button type="submit" class="btn btn-outline-secondary btn-submit-feedback mt-3">Insert course</button>
</form>


   </div>

</div>


</div>
</div>
<!-- end row Course -->










<!-- start row Course Content -->
<div class="row mt-3">

<button id="courseContentToggleButton" class="toggle-button d-flex justify-content-start py-3"><span class="fa fa-fw fa-list" style="font-size: 24px;"> </span>&nbsp; Show Insert New Course Content</button>
<div id="courseContentSection" style="display: none;">
@if($courses->isNotEmpty())
        <div class="table-responsive mt-3">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>whatLearn</th>
                <th>introduction</th>
                <th>resourceName</th>
                <th>youtubeTitle</th>
                <th>bookName</th>
                <th>Action</th>
                <!-- Other columns -->
            </tr>
        </thead>
        <tbody>
             @foreach ($courseContents as $content)
                <tr>
                    <td>{{ $content->id }}</td>
                    <td>{{ $content->course->course_name }}</td>
                    <td>{{ $content->what_to_learn }}</td>
                    <td>{{ $content->introduction  }}</td>
                    <td>{{ $content->resource_name }}</td>
                    <td>{{ $content->youtube_title }}</td>
                    <td>{{ $content->book_name }}</td>
                    <td>
                         <a href="{{ route('coursescontent.edit', ['content' => $content->id]) }}" class="btn btn-outline-primary btn-sm py-2 mt-2" >Edit </a>
            
                    </td>
                    <!-- Other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
       <div class="text-center my-3">
           <p class="text-center lead">No courses content data yet</p>
           <img src="{{ asset('storage/no-data.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:110px;">
        </div>
@endif
<div class="card" >
      
                <div class="card-body">
                    <h5 class="card-title mb-4">Insert Course Content Form</h5>
<form action="{{ route('coursescontent.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
        <label for="course" class="mb-2">Choose Course:</label>
        <select class="form-control" id="course" name="course">
            <option value="">Select course</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="introduction" >Course introduction:</label>
        <textarea class="form-control mt-1 mb-3" id="introduction" name="introduction" ></textarea>
    </div>
    <div class="form-group">
        <label for="whatLearn" >What to learn</label>
        <textarea class="form-control mt-1 mb-3" id="whatLearn" name="whatLearn" ></textarea>
    </div>
   
    <label for="bookName" class="mb-1">Book Title:</label>
    <input type="text" id="bookName" name="bookName" required>

<div id="drop-area" class="drop-area mt-4" >
    <input type="file" id="image7" name="image7" style="display: none;" onchange="displayFileName7()" />
    <label class="button" for="image7">Choose file</label>
    <div class="text-md mt-2" id="file-name7">To upload <b>image file</b> here for <b>Book cover</b> </div>
</div>     
<div id="drop-area" class="drop-area mt-4" >
    <input type="file" id="pdf_file" name="pdf_file" style="display: none;" onchange="displayFileName8()" />
    <label class="button" for="pdf_file">Choose file</label>
    <div class="text-md mt-2" id="file-name8">To upload <b>pdf file</b> here for <b>Book file</b> </div>
</div>     


    <label for="youtubeTitle" class="mt-3 mb-1">YouTube Title:</label>
    <input type="text" id="youtubeTitle" name="youtubeTitle" required>

    
    
     <div class="form-group">
        <label for="youtubeLink" class="my-1">YouTube Link:</label>
        <textarea class="form-control mt-1 mb-3" id="youtubeLink" name="youtubeLink" ></textarea>
    </div>

    <label for="resourceName" class="my-2">Resource Name:</label>
    <input type="text" id="resourceName" name="resourceName" required>

    <label for="resourceLink" class="my-1">Resource Link:</label>
    <input type="text" id="resourceLink" name="resourceLink" required>





    <button type="submit" class="btn btn-outline-secondary btn-submit-feedback mt-3">Insert course content</button>
</form>


   </div>

</div>


</div>
</div>
<!-- end row Course Content -->












<!-- start row Celebrities -->
<div class="row mt-3">

<button id="fameToggleButton" class="toggle-button d-flex justify-content-start py-3"><span class="fa fa-fw fa-star" style="font-size: 24px;"> </span>&nbsp; Show Insert New famous IT</button>
<div id="fameSection" style="display: none;">
@if($celebrities->isNotEmpty())
        <div class="table-responsive mt-3">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Famous Name</th>
                <th>Famous Job</th>
                <th>Famous Description</th>
                <th>Famous Salary</th>
                <th>Amount</th>
                <th>Action</th>
                <!-- Other columns -->
            </tr>
        </thead>
        <tbody>
            @foreach ($celebrities as $celebrity)
                <tr>
                    <td>{{ $celebrity->id }}</td>
                    <td>{{ $celebrity->name }}</td>
                    <td>{{ $celebrity->job  }}</td>
                    <td>{{ $celebrity->description }}</td>
                    <td>{{ $celebrity->net }}</td>
                    <td>{{ $celebrity->amount }}</td>
                    <td>
                        <form method="POST" action="{{ route('celebrities.destroy', ['celebrity' => $celebrity->id]) }}" onsubmit="return confirm('Are you sure you want to delete this {{  $celebrity->name }} celebrity?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                         <a href="{{ route('celebrity.edit', ['celebrity' => $celebrity->id]) }}" class="btn btn-outline-primary btn-sm py-2 mt-2" >Edit </a>
            
                        </form>
                    </td>
                    <!-- Other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
       <div class="text-center my-3">
           <p class="text-center lead">No Celebrities data yet</p>
           <img src="{{ asset('storage/no-data.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:110px;">
        </div>
@endif
<div class="card" >
      
                <div class="card-body">
                    <h5 class="card-title mb-4">Insert Celebrity Form</h5>
<form action="{{ url("/dashboard/celebrity") }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="famousName" class="mt-2">Famous Name:</label>
    <input type="text" id="famousName" name="famousName" required>

    <div class="form-group">
        <label for="famousJob" class="">Famous Job:</label>
        <input type="text" id="famousJob" name="famousJob" required>
    </div>
    <div class="form-group">
        <label for="famousDescription">Famous Description:</label>
        <textarea class="form-control mt-1 mb-3" id="famousDescription" name="famousDescription" ></textarea>
    </div>
    <div class="form-group">
        <label for="net">Net Worth:</label>
        <input type="number" id="net" name="net" step="0.01" required>
    </div>
    <div class="form-group">
        <label for="amount">Amount:</label>
        <select class="form-control" id="amount" name="amount">
            <option value="million">Million</option>
            <option value="billion">Billion</option>
        </select>
    </div>
    <div id="drop-area2" class="drop-area mb-2 mt-3">
        <input type="file" id="image2" name="image2" style="display: none;" onchange="displayFileName2()" />
        <label class="button" for="image2">Choose file</label>
        <div class="text-md mt-2" id="file-name2">To upload image file here</div>
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
 

    <button type="submit" class="btn btn-outline-secondary btn-submit-feedback mt-3">Insert celebrity</button>
</form>


   </div>

</div>


</div>
</div>
<!-- end row celebrities -->








<!-- start row Developers Tools -->
<div class="row mt-3">

<button id="DeveToolToggleButton" class="toggle-button d-flex justify-content-start py-3"><span class="fa fa-fw fa-laptop-code" style="font-size: 24px;"> </span>&nbsp; Show Insert New Developer Tools</button>
<div id="DeveToolSection" style="display: none;">
@if($deveTools->isNotEmpty())
        <div class="table-responsive mt-3">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tool Name</th>
                <th>Tool Description</th>
                <th>Action Delete</th>
                
                <!-- Other columns -->
            </tr>
        </thead>
        <tbody>
            @foreach ($deveTools as $deveTool)
                <tr>
                    <td>{{ $deveTool->id }}</td>
                    <td>{{ $deveTool->tool_name }}</td>
                    <td>{{ $deveTool->tool_description }}</td>
                    
                    <td>
                        <form method="POST" action="{{ route('developertools.destroy', ['developertool' => $deveTool->id]) }}" onsubmit="return confirm('Are you sure you want to delete this developer tool ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                         <a href="{{ route('devetool.edit', ['devetool' => $deveTool->id]) }}" class="btn btn-outline-primary btn-sm py-2 mt-2">Edit</a>

                        </form>
                    </td>
                    <!-- Other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
       <div class="text-center my-3">
           <p class="text-center lead">No Developers tools data yet</p>
           <img src="{{ asset('storage/no-data.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:110px;">
        </div>
@endif
<div class="card" >
      
                <div class="card-body">
                    <h5 class="card-title mb-4">Insert Developers tools Form</h5>
<form action="{{ url("/dashboard/devetool") }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="toolName" class="mt-2">Developer Tool Name:</label>
    <input type="text" id="toolName" name="toolName" required>

    
    <div class="form-group">
        <label for="toolDescription">Developer Tool Description:</label>
        <textarea class="form-control mt-1 mb-3" id="toolDescription" name="toolDescription" ></textarea>
    </div>

    <div id="drop-area3" class="drop-area mb-2 mt-3">
        <input type="file" id="image3" name="image3" style="display: none;" onchange="displayFileName3()" />
        <label class="button" for="image3">Choose file</label>
        <div class="text-md mt-2" id="file-name3">To upload image file here</div>
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
 

    <button type="submit" class="btn btn-outline-secondary btn-submit-feedback mt-3">Insert Tool</button>
</form>


   </div>

</div>


</div>
</div>
<!-- end row Developers Tools -->















<!-- start row Developers Tool Items -->
<div class="row mt-3">

<button id="DeveToolItemsToggleButton" class="toggle-button d-flex justify-content-start py-3"><span class="fa fa-fw fa-toolbox" style="font-size: 24px;"> </span>&nbsp; Show Insert New Developer Tool Items</button>
<div id="DeveToolItemsSection" style="display: none;">
@if($deveToolItems->isNotEmpty())
        <div class="table-responsive mt-3">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Developer Tool Name</th>
                <th>Type</th>
                <th>Link</th>
                <th>Item Description</th>
                <th>Action Delete</th>
                
                <!-- Other columns -->
            </tr>
        </thead>
        <tbody>
            @foreach ($deveToolItems as $deveToolItem)
                <tr>
                    <td>{{ $deveToolItem->id }}</td>
                    <td>{{ $deveToolItem->item_name }}</td>
                    <td>
                        {{ $deveToolItem->deveTools->tool_name }}
                    </td>
                    <td>{{ $deveToolItem->item_type}}</td>
                    <td>{{ $deveToolItem->link }}</td>
                    <td>{{ $deveToolItem->description }}</td>
                   
                    <td>
                        <form method="POST" action="{{ route('developertoolitem.destroy', ['developertoolitem' => $deveToolItem->id]) }}" onsubmit="return confirm('Are you sure you want to delete this developer tool item ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                         <a href="{{ route('toolitem.edit', ['deveitem' => $deveToolItem->id]) }}" class="btn btn-outline-primary btn-sm py-2 mt-2">Edit</a>

                        </form>
                    </td>
                    <!-- Other columns -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
       <div class="text-center my-3">
           <p class="text-center lead">No Developers tool items data yet.</p>
           <img src="{{ asset('storage/no-data.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:110px;">
        </div>
@endif
<div class="card" >
      
                <div class="card-body">
                    <h5 class="card-title mb-4">Insert Developers tool items Form</h5>
<form action="{{ url("/dashboard/devetoolitem") }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="tool" class="mb-2">Choose Developers tool:</label>
        <select class="form-control" id="tool" name="tool">
            <option value="">Select Developer tool</option>
            @foreach ($deveTools as $deveTool)
                <option value="{{ $deveTool->id }}">{{ $deveTool->tool_name }}</option>
            @endforeach
        </select>
    </div>
    <label for="itemName" class="mt-2">Developer tool item Name:</label>
    <input type="text" id="itemName" name="itemName" required>

    <label for="itemType" class="mt-2">Developer tool item type:</label>
    <input type="text" id="itemType" name="itemType" required>
    
    <div class="form-group">
        <label for="itemDescription">Developer tool item description:</label>
        <textarea class="form-control mt-1 mb-3" id="itemDescription" name="itemDescription" ></textarea>
    </div>

    <div class="form-group">
        <label for="itemLink">Developer tool item link:</label>
        <input type="text" id="itemLink" name="itemLink" required>
    </div>

    <div id="drop-area4" class="drop-area mb-2 mt-3">
        <input type="file" id="image4" name="image4" style="display: none;" onchange="displayFileName4()" />
        <label class="button" for="image4">Choose file</label>
        <div class="text-md mt-2" id="file-name4">To upload image file here</div>
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
 

    <button type="submit" class="btn btn-outline-secondary btn-submit-feedback mt-3">Insert Item</button>
</form>


   </div>

</div>


</div>
</div>
<!-- end row Developers Tool Items -->







<!-- start row tasks -->
<div class="row mt-3">

<button id="TaskToggleButton" class="toggle-button d-flex justify-content-start py-3 mb-2"><span class="fa fa-fw fa-thumbtack" style="font-size: 24px;"> </span>&nbsp; Show Insert New Course Task</button>
<div id="TaskSection" style="display: none;">
@if($tasks->isNotEmpty())
        <div class="table-responsive mt-3">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course title</th>
                <th>Task title</th>
                <th>Question</th>
                <th>Action Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->course->course_name }}</td>
                    <td>{{ $task->task_title }}</td>
                    <td>{{ $task->task_text }}</td>
                    <td>
                        <form method="POST" action="{{ route('coursetask.destroy', ['task' => $task->id]) }}" onsubmit="return confirm('Are you sure you want to delete this Course Task ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                         <a href="{{ route('task.edit', ['task' => $task->id]) }}" class="btn btn-outline-primary btn-sm py-2 mt-2">Edit</a>

                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
           <div class="text-center my-3">
           <p class="text-center lead">No Course Tasks data yet.</p>
           <img src="{{ asset('storage/no-data.png') }}" alt="no-items" class="rounded mx-auto d-block m-4 " style="width:110px;">
        </div>
@endif
<div class="card" >
      
                <div class="card-body">
                    <h5 class="card-title mb-4">Insert Course Tasks Form</h5>
<form action="{{ url("/dashboard/coursetask") }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="courseName" class="mb-2">Choose Course:</label>
        <select class="form-control " id="courseName" name="courseName">
            <option value="" >Select Course name</option>
             @foreach ($courses as $course)
                <option value="{{ $course->id }}" >{{ $course->course_name }}</option>
            @endforeach
        </select>
    </div>
    <label for="taskTitle" class="mt-2">Task Title:</label>
    <input type="text" id="taskTitle" name="taskTitle" required>
    
    <div class="form-group">
        <label for="taskDescription">Task description:</label>
        <textarea class="form-control mt-1 mb-3" id="taskDescription" name="taskDescription" ></textarea>
    </div>

    <div id="drop-area5" class="drop-area mb-2 mt-3">
        <input type="file" id="image5" name="image5" style="display: none;" onchange="displayFileName5()" />
        <label class="button" for="image5">Choose file</label>
        <div class="text-md mt-2" id="file-name5">To upload image file here</div>
        @error('image')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
 

    <button type="submit" class="btn btn-outline-secondary btn-submit-feedback mt-3">Insert Task</button>
</form>


   </div>

</div>


</div>
</div>
<!-- end row Tasks -->




























</div>








            





































               
  


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
           // Automatically hide the success message after 3 seconds
setTimeout(function() {
    var successAlert = document.getElementById('Alert');
    if (successAlert) {
        successAlert.style.display = 'none';
    }
}, 3000); // 3000 milliseconds = 3 seconds


function displayFileName2() {
    const input = document.getElementById('image2');
    const fileNameDisplay = document.getElementById('file-name2');
    if (input.files.length > 0) {
        fileNameDisplay.textContent = 'Selected file: ' + input.files[0].name;
        fileNameDisplay.style.color = 'green'; // Set text color to green
    } else {
        fileNameDisplay.textContent = 'To upload image file here';
        fileNameDisplay.style.color = ''; // Reset text color to default
    }
}

// upload image for Developer Tools
function displayFileName3() {
    const input = document.getElementById('image3');
    const fileNameDisplay = document.getElementById('file-name3');
    if (input.files.length > 0) {
        fileNameDisplay.textContent = 'Selected file: ' + input.files[0].name;
        fileNameDisplay.style.color = 'green'; // Set text color to green
    } else {
        fileNameDisplay.textContent = 'To upload image file here';
        fileNameDisplay.style.color = ''; // Reset text color to default
    }
}

// upload image for Developer Tool Items
function displayFileName4() {
    const input = document.getElementById('image4');
    const fileNameDisplay = document.getElementById('file-name4');
    if (input.files.length > 0) {
        fileNameDisplay.textContent = 'Selected file: ' + input.files[0].name;
        fileNameDisplay.style.color = 'green'; // Set text color to green
    } else {
        fileNameDisplay.textContent = 'To upload image file here';
        fileNameDisplay.style.color = ''; // Reset text color to default
    }
}


// upload image for Task
function displayFileName5() {
    const input = document.getElementById('image5');
    const fileNameDisplay = document.getElementById('file-name5');
    if (input.files.length > 0) {
        fileNameDisplay.textContent = 'Selected file: ' + input.files[0].name;
        fileNameDisplay.style.color = 'green'; // Set text color to green
    } else {
        fileNameDisplay.textContent = 'To upload image file here';
        fileNameDisplay.style.color = ''; // Reset text color to default
    }
}

// upload image for Task
function displayFileName6() {
    const input = document.getElementById('image6');
    const fileNameDisplay = document.getElementById('file-name6');
    if (input.files.length > 0) {
        fileNameDisplay.textContent = 'Selected file: ' + input.files[0].name;
        fileNameDisplay.style.color = 'green'; // Set text color to green
    } else {
        fileNameDisplay.textContent = 'To upload image file here';
        fileNameDisplay.style.color = ''; // Reset text color to default
    }
}
// upload file for image book 
function displayFileName7() {
        const input = document.getElementById('image7');
        const fileNameDisplay = document.getElementById('file-name7');
        if (input.files.length > 0) {
            fileNameDisplay.textContent = 'Selected file: ' + input.files[0].name;
            fileNameDisplay.style.color = 'green'; // Set text color to green
        } else {
            fileNameDisplay.textContent = 'To upload <b>image file</b> here for <b>Book cover</b>';
            fileNameDisplay.style.color = ''; // Reset text color to default
        }
    }
// upload file for pdf 
function displayFileName8() {
    const input = document.getElementById('pdf_file');
    const fileNameDisplay = document.getElementById('file-name8');
    if (input.files.length > 0) {
        fileNameDisplay.textContent = 'Selected file: ' + input.files[0].name;
        fileNameDisplay.style.color = 'green'; // Set text color to green
    } else {
        fileNameDisplay.textContent = 'To upload <b>pdf file</b> here for <b>Book file</b>';
        fileNameDisplay.style.color = ''; // Reset text color to default
    }
}








$(document).ready(function() {
    // For Users Section
    $("#usertoggleButton").click(function() {
        $("#usersSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-users" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show all users';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide all users");
        } else {
            $(this).html(icon + newText);
        }
    });
// For Catalog Section
$("#catalogToggleButton").click(function() {
        $("#catalogSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-bars" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show Insert New Catalog';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide Insert New Catalog");
        } else {
            $(this).html(icon + newText);
        }
    });

// For Course Section
$("#courseToggleButton").click(function() {
        $("#courseSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-leanpub" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show Insert New Course';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide Insert New Course");
        } else {
            $(this).html(icon + newText);
        }
    });

// For Course Content Section
$("#courseContentToggleButton").click(function() {
        $("#courseContentSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-list" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show Insert New Course Content';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide Insert New Course Content");
        } else {
            $(this).html(icon + newText);
        }
    });









// For Course Section
$("#fameToggleButton").click(function() {
        $("#fameSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-star" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show Insert New famous IT';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide Insert New famous IT");
        } else {
            $(this).html(icon + newText);
        }
    });


    // For Developer Tools Section
$("#DeveToolToggleButton").click(function() {
        $("#DeveToolSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-laptop-code" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show Insert New Developer Tools';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide Insert New Developer Tools");
        } else {
            $(this).html(icon + newText);
        }
    });




    // For Developer Tool Items Section
$("#DeveToolItemsToggleButton").click(function() {
        $("#DeveToolItemsSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-toolbox" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show Insert New Developer Tool Items';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide Insert New Developer Tool Items");
        } else {
            $(this).html(icon + newText);
        }
    });


    // For Tasks Section
$("#TaskToggleButton").click(function() {
        $("#TaskSection").slideToggle();

        var icon = '<span class="fa fa-fw fa-thumbtack" style="font-size: 24px;"> </span>&nbsp;';
        var newText = 'Show Insert New Course Task';
        var currentText = $(this).text().trim();

        if (currentText === newText) {
            $(this).html(icon + "Hide Insert New Course Task");
        } else {
            $(this).html(icon + newText);
        }
    });




// For post Section
 $("#toggleButton").click(function() {
        $("#postsSection").slideToggle();

     var currentText = $(this).text().trim();
    var icon = '<span class="fa fa-fw fa-comments" style="font-size: 24px;"> </span>&nbsp;';
    var $posts = '<div class="notificationCount" style="background-color:white ; color:blue;">' +
    '{{ $userPostCount }}' +
    '</div>';;

    var currentText = $(this).text().trim();

        if (currentText.includes("Show")) {
        $(this).html(icon + "Hide My Posts" + $posts);
    } else if (currentText.includes("Hide")) {
        $(this).html(icon + "Show My Posts" + $posts);
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

function toggleReply(commentId) {
    const replyInput = document.getElementById(`replyInput_${commentId}`);
    if (replyInput.style.display === 'none') {
        replyInput.style.display = 'block';
    } else {
        replyInput.style.display = 'none';
    }
}


$(document).ready(function () {
        // Select the input field and button
        var commentInput = $('#comment_text');
        var sendButton = $('#sendButton');

        // Add an input event listener to the input field
        commentInput.on('input', function () {
            // Enable the button and set opacity to 1 if there is text in the input field
            if (commentInput.val().trim() !== '') {
                sendButton.prop('disabled', false).css('opacity', 1);
            } else {
                // Disable the button and set opacity to 0.6 if the input field is empty
                sendButton.prop('disabled', true).css('opacity', 0.6);
            }
        });


         // Select the textarea and button
        var replyText = $('#replyText');
        var replyButton = $('#replyButton');

        // Add an input event listener to the textarea
        replyText.on('input', function () {
            // Enable the button and set style if there is text in the textarea
            if (replyText.val().trim() !== '') {
                replyButton.prop('disabled', false).removeClass('btn-outline-disabled').addClass('btn-outline-success');
            } else {
                // Disable the button and set style if the textarea is empty
                replyButton.prop('disabled', true).removeClass('btn-outline-success').addClass('btn-outline-disabled');
            }
        });

        // Add a submit event listener to the form
        $('#replyForm').on('submit', function () {
            // Disable the button and set style after submitting the form
            replyButton.prop('disabled', true).removeClass('btn-outline-success').addClass('btn-outline-disabled');
        });
    });



        </script>
    </x-app-layout>
</body>

