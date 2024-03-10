<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Feedback;
use App\Models\Course;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
class MemberController extends Controller
{

    
public function dashboard()
{
    $user = auth()->user();
    $userPosts = $user->posts()->with('comments')->get();
    $userPostCount = $user->posts()->count();
    $userFeedbacks = $user->feedback()->get();
    $userFeedbackCount = $user->feedback()->count();
    $comments = Comment::all();
    $replies = CommentReply::all();
    $users = User::all();
    $userNotes = Note::where('user_id', Auth::id())->get();
    $completedTasks = $user->completedTasks()->with('course')->get();
    $courseenrolled = $user->enrolledCourses()->get();

    
   // Retrieve notifications with eager loading
$notifications = collect([]);

$authUserId = Auth::id(); // Get the authenticated user's ID

$newPosts = Post::with('user')
    ->where('created_at', '>=', now()->subHours(24))
    ->where('user_id', '!=', $authUserId) // Exclude posts made by the authenticated user
    ->get();

$newFeedbacks = Feedback::with('user')
    ->where('created_at', '>=', now()->subHours(24))
    ->where('user_id', '!=', $authUserId) // Exclude feedback made by the authenticated user
    ->get();

$newCourses = Course::where('created_at', '>=', now()->subHours(24))
    ->get();

$newCommentsOnUserPosts = Comment::with('user', 'post')
    ->whereHas('post.user', function ($query) use ($user) {
        $query->where('id', $user->id);
    })
    ->where('created_at', '>=', now()->subHours(24))
    ->where('user_id', '!=', $authUserId)
    ->get();

$newRepliesToUserComments = CommentReply::with('user', 'comment.post')
    ->whereHas('comment.user', function ($query) use ($user) {
        $query->where('id', $user->id);
    })
    ->where('created_at', '>=', now()->subHours(24))
    ->where('user_id', '!=', $authUserId)
    ->get();

$notifications = $notifications->merge($newPosts)
    ->merge($newFeedbacks)
    ->merge($newCourses)
    ->merge($newCommentsOnUserPosts)
    ->merge($newRepliesToUserComments);
    return view('memberdashboard', compact(
        'userPosts',
        'comments',
        'userFeedbacks',
        'replies',
        'userPostCount',
        'userFeedbackCount',
        'users',
        'completedTasks',
        'courseenrolled',
        'notifications',
        'userNotes'
    ));
}


public function enrollCourse($courseId)
{
    $user = auth()->user();
    $course = Course::findOrFail($courseId);

    // Check if the user is already enrolled in the course
    if ($user->enrolledCourses()->where('course_id', $courseId)->exists()) {
        return redirect()->route('course.menu')->with('error', 'You are already enrolled in this course.');
    }

    // Enroll the user in the course
    $user->enrolledCourses()->attach($courseId);

    
    return redirect()->route('course.menu')->with('success', 'Course enrolled successfully!');

}

public function unenrollCourse($courseId)
{
    $user = auth()->user();

    // Check if the user is enrolled in the course
    if ($user->enrolledCourses()->where('course_id', $courseId)->exists()) {
        // Detach the course from the user
        $user->enrolledCourses()->detach($courseId);
        return redirect()->route('course.menu')->with('success', 'Course unenrolled successfully!');
    }

    return redirect()->route('course.menu')->with('error', 'You are not enrolled in this course.');
}


public function storeNote(Request $request)
{
    // Validate the request
    $request->validate([
        'noteTitle' => 'required',
        'noteContent' => 'required',
    ]);

    try {
        Note::create([
            'title' => $request->input('noteTitle'),
            'content' => $request->input('noteContent'),
            'user_id' => Auth::id(),
        ]);

         return redirect()->route('memberdashboard')->with('success', 'Note created successfully.');
    } catch (\Exception $e) {
         return redirect()->route('memberdashboard')->with('error', 'Failed to create note: ' . $e->getMessage());
    }
}

public function noteDestroy(Note $note)
{
    // Check if the authenticated user owns this note before deleting
    if ($note->user_id !== Auth::id()) {
        return redirect()->route('memberdashboard')->with('error', 'Unauthorized access.');
    }

    try {
        $note->delete();
        return redirect()->route('memberdashboard')->with('success', 'Note deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('memberdashboard')->with('error', 'Failed to delete note: ' . $e->getMessage());
    }
}
   
}

