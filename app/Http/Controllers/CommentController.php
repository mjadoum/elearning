<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
class CommentController extends Controller
{
  

    /**
     * Store a newly created resource in storage.
     */
public function storeComment(Request $request, Post $post) {
    $validatedData = $request->validate([
        'comment_text' => 'required',
    ]);

    $comment = new Comment();
    $comment->post_id = $post->id; // Accessing the post ID directly from the $post variable
    $comment->user_id = auth()->user()->id; // Assuming you have user authentication
    $comment->comment = $request->input('comment_text');

    $comment->save();

    return redirect()->back()->with('success', 'Comment added successfully!');
}

public function storeReply(Request $request, $commentId) {
    // Validate the incoming request
    $validatedData = $request->validate([
        'reply_text' => 'required',
        // Add other validation rules if needed
    ]);

    // Create a new CommentReply instance
    $reply = new CommentReply();
    $reply->comment_id = $commentId; // This will set the comment_id for the reply
    $reply->user_id = auth()->id(); // Assuming you have user authentication
    $reply->reply_text = $request->input('reply_text');
    
    // Save the reply
    $reply->save();

    // Redirect back or perform any necessary action
    return redirect()->back()->with('success', 'Reply added successfully!');
}

// Method to fetch user details for a reply
    public function getUserForReply(CommentReply $reply)
    {
        // Fetch the user associated with the user_id
        $replyingUser = User::find($reply->user_id);

        // Check if the user exists
        if ($replyingUser) {
            // Return user details
            return $replyingUser;
        } else {
            // Handle case when user is not found
            return null;
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
    // Ensure the authenticated user is authorized to delete this comment
    if (auth()->user()->id !== $comment->user_id) {
        abort(403); // Unauthorized action
    }

    $comment->delete();

    return redirect()->back()->with('success', 'Comment deleted successfully');
    }

    public function replyDestroy(CommentReply $reply)
    {
    // Ensure the authenticated user is authorized to delete this comment
    if (auth()->user()->id !== $reply->user_id) {
        abort(403); // Unauthorized action
    }

    $reply->delete();

    return redirect()->back()->with('success', 'Reply deleted successfully');
    }
}
