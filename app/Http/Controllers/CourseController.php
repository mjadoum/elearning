<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Post;
use App\Models\Book;
use App\Models\Course;
use App\Models\Catalog;
use App\Models\CourseContent;
use App\Models\Celebritie;
use App\Models\DeveTools;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
class CourseController extends Controller
{


// home page
    public function index()
    {

        $feedbacks = Feedback::all(); // Fetch all feedbacks
        $courses = Course::all();
        $coursesCount =  $courses->count(); 
        // Count feedbacks with a rating more than 3
        $feedbacksCount = Feedback::where('rating', '>', 3)->count();
        $latestFeedbacks = Feedback::orderByDesc('created_at')->take(3)->get();
    if ($feedbacksCount === 0) {
        $averageRating = 0; // Set average rating to 0 when there are no feedbacks
    } else {
        // Calculate the total sum of ratings
        $totalRatings = $feedbacks->sum('rating');

        // Calculate the average rating
        $averageRating = $totalRatings / $feedbacksCount;
    }
    $usersCount = User::where('role', '=', 'member')->count(); // Count the total number of users
    return  view('index', [
        'feedbacks' => $feedbacks,
        'feedbacksCount' => $feedbacksCount,
        'averageRating' => $averageRating,
        'latestFeedbacks' => $latestFeedbacks,
        'usersCount' => $usersCount,
        'coursesCount' => $coursesCount,
    ]);







      
    }


// show Items page
    public function showItems($toolId)
    {
    $tool = DeveTools::findOrFail($toolId);
    $items = $tool->deveToolItems; // Assuming the relationship is correctly defined

    return view('deveitems.items', compact('items', 'tool'));
    }


// show course contents page
public function showCourseContent($courseId)
{
     $course = Course::findOrFail($courseId);
    $courseContents = CourseContent::where('course_id', $course->id)->get();
    $tasks = Task::where('course_id', $course->id)->get();

    // Get related courses with the same catalog_id from the Catalog table
    $relatedCourses = Course::where('catalog_id', $course->catalog_id)
                        ->where('id', '!=', $course->id) // Exclude the current course
                        ->get();
    return view('courses.contents', compact('courseContents', 'course', 'tasks', 'relatedCourses'));
}

// show course tasks page

public function showCourseTasks($courseId)
{
    $course = Course::findOrFail($courseId);

    // Fetch tasks related to the course
    $courseTasks = Task::where('course_id', $course->id)->get();
    // Get the currently authenticated user
    $user = Auth::user();
    return view('tasks.task', compact('courseTasks', 'course', 'user'));
}


// course Menu page
    public function courseMenu()
    {
        $user = auth()->user();
        
        $courses = Course::all();
        $deveTools = DeveTools::all();
        return view('webpages.coursemenu', ['courses' => $courses, 'deveTools' => $deveTools, 'user' => $user]);
    }

// feedback page
     public function feedback()
    {
       $feedbacks = Feedback::all(); // Fetch all feedbacks

    $feedbacksCount = $feedbacks->count(); // Get the count of feedbacks

    if ($feedbacksCount === 0) {
        $averageRating = 0; // Set average rating to 0 when there are no feedbacks
    } else {
        // Calculate the total sum of ratings
        $totalRatings = $feedbacks->sum('rating');

        // Calculate the average rating
        $averageRating = $totalRatings / $feedbacksCount;
    }

    return view('webpages.feedback', [
        'feedbacks' => $feedbacks,
        'feedbacksCount' => $feedbacksCount,
        'averageRating' => $averageRating,
    ]);
    }
// Quiz page
    public function quiz()
    {
         $course = Course::all();
        
        return view('webpages.quiz', ['course' => $course]);
    }
// community page
    public function community()
    {
         $posts = Post::all(); 
        
        return view('webpages.community', ['posts' => $posts]);
    }

// about us page
     public function about()
    {
        
        return view('webpages.aboutus');
    }

    // policy and terms page
     public function terms()
    {
        
        return view('webpages.terms');
    }
         public function policy()
    {
        
        return view('webpages.policy');
    }
// accessibility page
     public function accessibility()
    {
        
        return view('webpages.accessibility');
    }

// celebrities page
     public function celebrities()
    {
        $celebrities = Celebritie::all();
        return view('webpages.celebrities', [
        'celebrities' => $celebrities, // Pass the count to the view
    ]);
    }



    
}

