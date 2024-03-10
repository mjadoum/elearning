<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use App\Models\CommentReply;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function indexPost()
{
    $posts = Post::all(); // Fetch all feedbacks
    $comments = Comment::all();
    $replies = CommentReply::all();
    $posts = Post::with('comments')->get();
     
    
   return view('webpages.community', ['posts' => $posts, 'comments' => $comments, 'comment_replies' => $replies]);

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function storePost(Request $request)
{

    // Validate the incoming request
    $request->validate([
        'message' => 'required',
        'title' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
    ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
    ]);

    // Store cover image in the specified directory (storage/app/public/images)
    $imagePath = null; // Initialize imagePath to null

    // Check if a file is uploaded before trying to store it
    if ($request->hasFile('image')) {
        // Store cover image in the specified directory (storage/app/public/images)
        $imagePath = $request->file('image')->store('images', 'public');
    }


    // Store the feedback in the database
    Post::create([
        'user_id' => auth()->id(), // If feedback is associated with users
        'message' => $request->input('message'),
        'title' => $request->input('title'),
        'image_path' => $imagePath,
    ]);

     // Redirect to feedback page with all feedbacks
return redirect()->back()->with('success', 'Thanks for your Post.');

}





    /**
     * Display the specified resource.
     */
public function showUserPost($userId)
{
    $posts = Post::all(); // Retrieve all books
    $users = User::all(); // Retrieve all users

    // Pass both books and users data to the view
   
    
    return view('webpages.community', ['user' => $user, 'posts' => $posts]);
}

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    // Find the post by its ID
    $post = Post::findOrFail($id);

    // Pass the post data to the view where you'll have your edit form
    return view('posts.edit', compact('post'));
}

public function update(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'message' => 'required',
        'title' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
    ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
    ]);

    // Find the post by its ID
    $post = Post::findOrFail($id);

    // Update the post with the new data
    $post->message = $request->input('message');
    $post->title = $request->input('title');

    // Check if a new image is uploaded and update the image_path if necessary
    if ($request->hasFile('image')) {
        // Store cover image in the specified directory (storage/app/public/images)
        $imagePath = $request->file('image')->store('images', 'public');
        $post->image_path = $imagePath;
    }

    // Check if the 'remove_image' checkbox is checked
    if ($request->has('remove_image')) {
        // Delete the existing image associated with the post
        Storage::disk('public')->delete($post->image_path);
        $post->image_path = null; // Set the image_path to null in the database
    }

    // Save the updated post
    $post->save();

    // Check the authenticated user's role
    if (Auth::user()->role === 'admin') {
        // Redirect admin users to the admin dashboard
        return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
    } elseif (Auth::user()->role === 'member') {
        // Redirect member users to the member dashboard
        return redirect()->route('memberdashboard')->with('success', 'Post updated successfully!');
    }

}

public function search(Request $request)
{
    $query = $request->input('q');

    $posts = Post::join('users', 'posts.user_id', '=', 'users.id')
                 ->where('title', 'like', '%' . $query . '%')
                 ->orWhere('message', 'like', '%' . $query . '%')
                 ->orWhere('users.name', 'like', '%' . $query . '%')
                 ->get(['posts.*']);

    return view('posts.search_results', compact('posts', 'query'));
}
    /**
     * Remove the specified resource from storage.
     */
public function postDestroy(Post $post)
{
    $post = Post::findOrFail($post->id);
    // Delete the image file
    Storage::delete('public/' . $post->image_path);
    
     $post->delete();
     return back()->with(['operation'=>'deleted', 'id'=>$post->id])->with(['success' => 'Post deleted successfully.']);
}
}