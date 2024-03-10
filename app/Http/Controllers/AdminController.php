<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\User;
use App\Models\Course;
use App\Models\Celebritie;
use App\Models\DeveTools;
use App\Models\DeveToolItems;
use App\Models\Task;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\CourseContent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


 public function dashboard()
{
   
    $users = User::all(); // Retrieve all users
    $catalogs = Catalog::all(); // Retrieve all Catalogs
    $courses = Course::all();
    $usersCount = User::count(); // Count the total number of users
    $celebrities = Celebritie::all();
    $deveTools = DeveTools::all();
    $deveToolItems = DeveToolItems::all();
    $tasks = Task::all();
    $courseContents = CourseContent::all();
    $user = auth()->user();
    $userPosts = $user->posts()->with('comments')->get();
    $userPostCount = auth()->user()->posts()->count();


    // Retrieve notifications with eager loading
$notifications = collect([]);

$authUserId = Auth::id(); // Get the authenticated user's ID



$newFeedbacks = Feedback::with('user')
    ->where('created_at', '>=', now()->subHours(24))
    ->where('user_id', '!=', $authUserId) // Exclude feedback made by the authenticated user
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

$notifications = $notifications->merge($newFeedbacks)
    ->merge($newCommentsOnUserPosts)
    ->merge($newRepliesToUserComments);
    
    
    // Pass both books, users, catalogs, courses data, and the user count to the view
    return view('dashboard', [
        'users' => $users,
        'catalogs' => $catalogs,
        'courses' => $courses,
        'usersCount' => $usersCount,
        'celebrities' => $celebrities,
        'deveTools' => $deveTools,
        'deveToolItems' => $deveToolItems,
        'userPosts' => $userPosts, // Pass the count to the view
        'userPostCount' => $userPostCount,
        'tasks' => $tasks,
        'courseContents' => $courseContents,
        'notifications'=> $notifications,
        
    ]);
}


    
    /**
     * Store a newly created resource in storage.
     */
    // Method to store a newly created catalog in the database
    public function storeCatalog(Request $request)
    {
        // Validate the request
    $request->validate([
        
        'catalogName' => 'required',
        'catalogDescription' => 'required',
        
    ]);

    try {
    Catalog::create([
        'catalog_name' => $request->input('catalogName'),
        'catalog_description' => $request->input('catalogDescription'),
    ]);
    return redirect()->route('dashboard')->with('success', 'Catalog inserted successfully.');
} catch (\Exception $e) {
    return redirect()->route('dashboard')->with('error', 'Failed to insert catalog: ' . $e->getMessage());
}

     // Redirect to feedback page with all feedbacks
   return redirect()->route('dashboard')->with('success', 'Catalog inserted successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Method to store a newly created catalog in the database
   public function storeCourse(Request $request)
{
    $request->validate([
        'courseTitle' => 'required',
        'courseDescription' => 'required',
        'catalog' => 'required', 
        'level' => 'required',
        'timeLong' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }

    $complete = $request->has('complete') ? true : false; // Check if checkbox is checked

    Course::create([
        'course_name' => $request->input('courseTitle'),
        'course_description' => $request->input('courseDescription'),
        'catalog_id' => $request->input('catalog'),
        'level' => $request->input('level'),
        'time_long' => $request->input('timeLong'),
        'complete' => $complete,
        'image_path' => $imagePath,
    ]);

    return redirect()->route('dashboard')->with('success', 'Course inserted successfully.');
}







    /**
     * Store a newly created resource in storage.
     */
    // Method to store a newly created catalog in the database
   public function storeCourseContnet(Request $request)
{
    $request->validate([
        'course' => 'required',
        'bookName' => 'required',
        'whatLearn' => 'required', 
        'youtubeTitle' => 'required',
        'youtubeLink' => 'required',
        'introduction' => 'required', 
        'resourceName' => 'required',
        'resourceLink' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'pdf_file' => 'required|mimes:pdf|max:2048',
    ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
        'pdf_file.mimes' => 'Supported file format is pdf',
        'pdf_file.max' => 'Maximum file size allowed is 2048 KB',
    ]);

    $imagePath = null;

    if ($request->hasFile('image7')) {
        $imagePath = $request->file('image7')->store('images', 'public');
    }
// Store PDF file in the specified directory (storage/app/public/pdf_files)
    if ($request->hasFile('pdf_file')) {
        $pdfPath = $request->file('pdf_file')->store('pdf_files', 'public');
    }
 

    CourseContent::create([
        'course_id' => $request->input('course'),
        'book_name' => $request->input('bookName'),
        'pdf_path' => $pdfPath,
        'what_to_learn' => $request->input('whatLearn'),
        'youtube_title' => $request->input('youtubeTitle'),
        'youtube_link' => $request->input('youtubeLink'),
        'introduction' => $request->input('introduction'),
        'resource_name' => $request->input('resourceName'),
        'resource_link' => $request->input('resourceLink'),
        'book_cover' => $imagePath,
    ]);

    return redirect()->route('dashboard')->with('success', 'Course Content inserted successfully.');
}















 /**
     * Store a newly created resource in storage.
     */
    // Method to store a newly created catalog in the database
     public function storefamous(Request $request)
    {
       // Validate the request
    $request->validate([

        'famousName' => 'required',
        'famousJob' => 'required',
        'famousDescription' => 'required',
        'net' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',// Adjust file types and size as needed
        'amount' => 'required|in:million,billion', // Validate the 'amount' field 
        ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
    ]);
// Store cover image in the specified directory (storage/app/public/images)
    $imagePath = null; // Initialize imagePath to null

    // Check if a file is uploaded before trying to store it
    if ($request->hasFile('image2')) {
        // Store cover image in the specified directory (storage/app/public/images)
        $imagePath = $request->file('image2')->store('images', 'public');
    }

       // Store the course in the database along with the catalog_id
    Celebritie::create([
        'name' => $request->input('famousName'),
        'job' => $request->input('famousJob'),
        'description' => $request->input('famousDescription'),
        'net' => $request->input('net'),
        'image_path' => $imagePath,
        'amount' => $request->input('amount'), // Adding the 'amount' column
    ]);

     // Redirect to feedback page with all feedbacks
   return redirect()->route('dashboard')->with('success', 'Celebrity stored successfully.');
    }


 /**
     * Store a newly created resource in storage.
     */
    // Method to store a newly created catalog in the database
     public function storeDeveTool(Request $request)
    {
       // Validate the request
    $request->validate([

        'toolName' => 'required',
        'toolDescription' => 'required',
        'image3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',// Adjust file types and size as needed
        ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
    ]);
// Store cover image in the specified directory (storage/app/public/images)
    $imagePath = null; // Initialize imagePath to null

    // Check if a file is uploaded before trying to store it
    if ($request->hasFile('image3')) {
        // Store cover image in the specified directory (storage/app/public/images)
        $imagePath = $request->file('image3')->store('images', 'public');
    }

       // Store the course in the database along with the catalog_id
    DeveTools::create([
        'tool_name' => $request->input('toolName'),
        'tool_description' => $request->input('toolDescription'),
        'image_path' => $imagePath,
    ]);

     // Redirect to feedback page with all feedbacks
   return redirect()->route('dashboard')->with('success', 'Developers Tool stored successfully.');
    }

/**
     * Store a newly created resource in storage.
     */
    // Method to store a newly created catalog in the database
     public function storeDeveToolItem(Request $request)
    {
       // Validate the request
    $request->validate([
        'tool' => 'required',
        'itemName' => 'required',
        'itemType' => 'required',
        'itemDescription' => 'required',
        'itemLink' => 'required',
        
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
    ]);
// Store cover image in the specified directory (storage/app/public/images)
    $imagePath = null; // Initialize imagePath to null

    // Check if a file is uploaded before trying to store it
    if ($request->hasFile('image4')) {
        // Store cover image in the specified directory (storage/app/public/images)
        $imagePath = $request->file('image4')->store('images', 'public');
    }

       // Store the course in the database along with the catalog_id
    DeveToolItems::create([
        'devetool_id' => $request->input('tool'),
        'item_name' => $request->input('itemName'),
        'item_type' => $request->input('itemType'),
        'description' => $request->input('itemDescription'),
        'link' => $request->input('itemLink'),
        'image_path' => $imagePath, // Provide a default value if no image was uploaded
    ]);

     // Redirect to feedback page with all feedbacks
   return redirect()->route('dashboard')->with('success', 'Developers tool item stored successfully.');
    }








/**
     * Store a newly created resource in storage.
     */
    // Method to store a newly created catalog in the database
     public function storeCourseTasks(Request $request)
    {
       // Validate the request
    $request->validate([
        'courseName' => 'required',
        'taskTitle' => 'required',
        'taskDescription' => 'required',
        
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
    ]);
// Store cover image in the specified directory (storage/app/public/images)
    $imagePath = null; // Initialize imagePath to null

    // Check if a file is uploaded before trying to store it
    if ($request->hasFile('image5')) {
        // Store cover image in the specified directory (storage/app/public/images)
        $imagePath = $request->file('image5')->store('images', 'public');
    }

       // Store the course in the database along with the catalog_id
    Task::create([
        'course_id' => $request->input('courseName'),
        'task_title' => $request->input('taskTitle'),
        'task_text' => $request->input('taskDescription'),
        'image_path' => $imagePath, // Provide a default value if no image was uploaded
    ]);

     // Redirect to feedback page with all feedbacks
   return redirect()->route('dashboard')->with('success', 'Course Task stored successfully.');
    }

public function completeTask($taskId)
{
    $user = auth()->user();
    $task = Task::findOrFail($taskId);

    // Check if the task is already completed by the user
    if (!$user->completedTasks()->where('task_id', $task->id)->exists()) {
        // Attach the completed task to the user if not completed already
        $user->completedTasks()->attach($task);
        return redirect()->back()->with('success', "Well done you've completed it successfully!");
    }

    return redirect()->back()->with('error', 'Task already completed!');
}














public function celebrityEdit($id)
{
    // Find the post by its ID
    $celebrity = Celebritie::findOrFail($id);

    // Pass the post data to the view where you'll have your edit form
    return view('celebrities.edit', compact('celebrity'));
}

public function celebrityUpdate(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'famousName' => 'required',
        'famousJob' => 'required',
        'famousDescription' => 'required',
        'net' => 'required|numeric',
        'amount' => 'required|in:million,billion', // Validation for the 'amount' field
        'image2' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
    ], [
        'image2.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image2.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image2.max' => 'Maximum file size allowed is 2048 KB',
    ]);

    // Find the celebrity by its ID
    $celebrity = Celebritie::findOrFail($id);

    // Update the celebrity with the new data
    $celebrity->name = $request->input('famousName');
    $celebrity->job = $request->input('famousJob');
    $celebrity->description = $request->input('famousDescription');
    $celebrity->net = $request->input('net');
    $celebrity->amount = $request->input('amount'); // Update the 'amount' column

    // Check if a new image is uploaded and update the image_path if necessary
    if ($request->hasFile('image2')) {
        // Store image in the specified directory (storage/app/public)
        $imagePath = $request->file('image2')->store('images', 'public');
        // Delete the old image if it exists
        if ($celebrity->image_path) {
            Storage::disk('public')->delete($celebrity->image_path);
        }
        $celebrity->image_path = $imagePath;
    } elseif ($request->has('remove_image')) {
        // Delete the existing image associated with the celebrity
        Storage::disk('public')->delete($celebrity->image_path);
        $celebrity->image_path = null; // Set the image_path to null in the database
    }

    // Save the updated celebrity
    $celebrity->save();

    return redirect()->route('dashboard')->with('success', 'Celebrity updated successfully!');
}




public function deveToolEdit($id)
{
    // Find the post by its ID
    $deveTool = DeveTools::findOrFail($id);
    

    // Pass the post data to the view where you'll have your edit form
    return view('deveitems.editDeveTool', compact('deveTool'));
}



public function deveToolUpdate(Request $request, $id)
{
    $request->validate([
        'toolName' => 'required',
        'toolDescription' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
    ]);


    // Find the post by its ID
    $deveTool = DeveTools::findOrFail($id);



    // Update DeveToolItem fields
    $deveTool->tool_name = $request->input('toolName');
    $deveTool->tool_description = $request->input('toolDescription');
    


    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        if ($deveTool->image_path) {
            Storage::disk('public')->delete($deveTool->image_path);
        }
        $deveTool->image_path = $imagePath;
    }  elseif ($request->has('remove_image')) {
        Storage::disk('public')->delete($deveTool->image_path);
        $deveTool->image_path = null;
    }

    $deveTool->save(); // Save the changes



    return redirect()->route('dashboard')->with('success', 'Developers Tool updated successfully.');
}














public function deveItemEdit($id)
{
    // Find the post by its ID
    $toolitem = DeveToolItems::findOrFail($id);
    // Fetch all DeveTools to populate the dropdown
    $deveTools = DeveTools::all();

    // Pass the post data to the view where you'll have your edit form
    return view('deveitems.edit', compact('toolitem', 'deveTools'));
}


 public function deveItemUpdate(Request $request, DevToolItem $deveitem)
{
    // Validate the request data
    $validatedData = $request->validate([
        'tool' => 'required|exists:deve_tools,id',
        'itemName' => 'required|string',
        'itemType' => 'required|string',
        'itemDescription' => 'required|string',
        'itemLink' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules as needed
    ]);

    // Update the tool item details
    $deveitem->devetool_id = $validatedData['tool'];
    $deveitem->item_name = $validatedData['itemName'];
    $deveitem->item_type = $validatedData['itemType'];
    $deveitem->description = $validatedData['itemDescription'];
    $deveitem->link = $validatedData['itemLink'];

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public');
        $deveitem->image_path = str_replace('public/', '', $imagePath);
    }

    // Save the updated tool item
    $deveitem->save();

    // Redirect back with success message or do whatever you need
 
return redirect()->route('dashboard')->with('success', 'Developer tool item updated successfully.');

}









public function taskEdit($id)
{
    // Find the post by its ID
    $task = Task::findOrFail($id);
    // Fetch all DeveTools to populate the dropdown
    $courses = Course::all();

    $course = $task->course;
    // Pass the post data to the view where you'll have your edit form
    return view('tasks.edit', compact('task', 'courses','course'));
}

public function taskUpdate(Request $request, $id)
{
    $request->validate([
        'courseName' => 'required',
        'taskTitle' => 'required',
        'taskDescription' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
    ]);

    // Find the Task by its ID
    $task = Task::findOrFail($id);

    // Update Task fields
    $task->course_id = $request->input('courseName');
    $task->task_title = $request->input('taskTitle');
    $task->task_text = $request->input('taskDescription');

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        if ($task->image_path) {
            Storage::disk('public')->delete($task->image_path);
        }
        $task->image_path = $imagePath;
    } elseif ($request->has('remove_image')) {
        Storage::disk('public')->delete($task->image_path);
        $task->image_path = null;
    }

    $task->save(); // Save the changes

    return redirect()->route('dashboard')->with('success', 'Task updated successfully!');
}









public function courseEdit($id)
{
    // Find the post by its ID
    $course = Course::findOrFail($id);
    // Fetch all DeveTools to populate the dropdown
    $catalogs = Catalog::all();

    // Pass the post data to the view where you'll have your edit form
    return view('courses.edit', compact('course', 'catalogs'));
}




public function courseUpdate(Request $request, $id)
{
    $request->validate([
        'courseTitle' => 'required',
        'courseDescription' => 'required',
        'catalog' => 'required', // Validate the catalog selection
        'level' => 'required',
        'timeLong' => 'required',
        'complete' => 'required', 
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
    ], [
        'image.image' => 'The file must be an image (jpeg, png, jpg, gif)',
        'image.mimes' => 'Supported image formats are jpeg, png, jpg, gif',
        'image.max' => 'Maximum file size allowed is 2048 KB',
    ]);

    // Find the course by its ID
    $course = Course::findOrFail($id);

    // Update course fields
    $course->course_name = $request->input('courseTitle');
    $course->course_description = $request->input('courseDescription');
    $course->level = $request->input('level');
    $course->time_long = $request->input('timeLong');

    $course->catalog_id = $request->input('catalog');
    // Update the 'complete' field based on the checkbox value
    $course->complete = $request->input('complete') ? 1 : 0; // Update the 'complete' field based on checkbox

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');

        // Delete previous image if exists
        if ($course->image_path) {
            Storage::disk('public')->delete($course->image_path);
        }

        $course->image_path = $imagePath;
    } 

    $course->save(); // Save the changes

    return redirect()->route('dashboard')->with('success', 'Course updated successfully!');
}


public function coursesContentEdit($id)
{
    // Find the post by its ID
    $courseContent = CourseContent::findOrFail($id);
    // Fetch all DeveTools to populate the dropdown
    $courses = Course::all();
    // Find the specific course related to the $courseContent
    $course = $courseContent->course; // Adjust the relationship method accordingly
    
    // Pass the data to the view
    return view('courses.editContent', compact('courseContent', 'courses', 'course'));

   
}

public function coursesContentUpdate(Request $request, $id)
{
    
    // Find the course content by its ID
    $courseContent = CourseContent::findOrFail($id);

    // Update other course content fields
    $courseContent->course_id = $request->input('course');
    $courseContent->book_name = $request->input('bookName');
    $courseContent->what_to_learn = $request->input('whatLearn');
    $courseContent->youtube_title = $request->input('youtubeTitle');
    $courseContent->youtube_link = $request->input('youtubeLink');
    $courseContent->introduction = $request->input('introduction');
    $courseContent->resource_name = $request->input('resourceName');
    $courseContent->resource_link = $request->input('resourceLink');

    // Handle image upload
    if ($request->hasFile('image_file')) {
        $imagePath = $request->file('image_file')->store('images', 'public');

        // Delete previous image if exists
        if ($courseContent->book_cover) {
            Storage::disk('public')->delete($courseContent->book_cover);
        }
        $courseContent->book_cover = $imagePath; // Assign new image path here
    }

    // Handle PDF file upload
    if ($request->hasFile('pdf_file')) {
        $pdfPath = $request->file('pdf_file')->store('pdf_files', 'public');

        // Delete previous PDF file if exists
        if ($courseContent->pdf_path) {
            Storage::disk('public')->delete($courseContent->pdf_path);
        }
        $courseContent->pdf_path = $pdfPath; // Assign new PDF path here
    }

    // Save the changes
    $courseContent->save();

    return redirect()->route('dashboard')->with('success', 'Course Content updated successfully!');
}


















public function catalogEdit($id)
{
    
    // Fetch all DeveTools to populate the dropdown
    $catalog = Catalog::findOrFail($id);

    // Pass the post data to the view where you'll have your edit form
    return view('courses.editCatalog', compact('catalog'));
}




public function catalogUpdate(Request $request, $id)
{
    $request->validate([
        'catalogName' => 'required',
        'catalogDescription' => 'required',
    ]);

    // No need to use findOrFail, Laravel will automatically resolve the Catalog instance
    $catalog = Catalog::findOrFail($id);
    // Update Catalog fields
    $catalog->catalog_name = $request->input('catalogName');
    $catalog->catalog_description = $request->input('catalogDescription');

    $catalog->save(); // Save the changes
    return redirect()->route('dashboard')->with('success', 'Catalog updated successfully!');
}
































    /**
     * Remove the users from users table.
     */
    public function userDestroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User deleted successfully');
    }
    public function catalogDestroy(Catalog $catalog)
    {
        $catalog->delete();

        return redirect()->route('dashboard')->with('success', 'Catalog deleted successfully');
    }
        public function courseDestroy(Course $course)
    {
        $course->delete();

        return redirect()->route('dashboard')->with('success', 'Course deleted successfully');
    }
        public function celebrityDestroy(Celebritie $celebrity)
    {
         $celebrity->delete();

         return redirect()->route('dashboard')->with('success', 'Celebrity deleted successfully');
    }
        public function devetoolDestroy(DeveTools $developertool)
    {
        $developertool->delete();

        return redirect()->route('dashboard')->with('success', 'Developer Tool deleted successfully');
    }
        public function developertoolitemDestroy(DeveToolItems $developertoolitem)
    {
        $developertoolitem->delete();

        return redirect()->route('dashboard')->with('success', 'Developer tool item deleted successfully');
    }
        public function taskDestroy(Task $task)
{
    try {
        $task->delete();
        return redirect()->route('dashboard')->with('success', 'Course Task deleted successfully');
    } catch (\Exception $e) {
        // Log the error or handle it accordingly
        return back()->withError('Failed to delete task: ' . $e->getMessage());
    }
}
public function deleteUserTask($taskId)
{
    $user = auth()->user();
    $user->completedTasks()->detach($taskId);

    // Redirect back to the 'memberdashboard' route with a success message
    return redirect()->route('memberdashboard')->with('success', 'Task deleted successfully!');
}


}
