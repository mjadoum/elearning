<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ToolController;

use App\Http\Controllers\Auth\SocialLoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Display  
Route::get('/', [CourseController::class, 'index'])->name('index');




Route::get('/login/{provider}', [SocialLoginController::class, 'redirectToProvider'])->name('social.login');
Route::get('/login/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback']);


// Store Routes

// Store feedbacks 
Route::post('/webpages/feedback', [FeedbackController::class, 'storeFeedback'])->name('feedback.store');
// Store posts 
Route::post('/webpages/community', [PostController::class, 'storePost'])->name('post.store');
// Store comments 
Route::post('/webpages/community/{post}', [CommentController::class, 'storeComment'])->name('comment.store');
// Store comment replies
Route::post('/webpages/community/{comment}/reply', [CommentController::class, 'storeReply'])->name('comments.reply');
// Store Catalog
Route::post('/dashboard/catalog', [AdminController::class, 'storeCatalog']);
// Store Courses
Route::post('/dashboard/course', [AdminController::class, 'storeCourse']);
// Store course content 
Route::post('/dashboard/coursescontent', [AdminController::class, 'storeCourseContnet'])->name('coursescontent.store');
// Store Celebrity
Route::post('/dashboard/celebrity', [AdminController::class, 'storefamous']);
// Store Developers Tools
Route::post('/dashboard/devetool', [AdminController::class, 'storeDeveTool']);
// Store Developers Tool Items
Route::post('/dashboard/devetoolitem', [AdminController::class, 'storeDeveToolItem']);
// Store course tasks
Route::post('/dashboard/coursetask', [AdminController::class, 'storeCourseTasks']);
// Store course completed tasks
Route::post('/tasks/{taskId}/complete', [AdminController::class, 'completeTask'])->name('tasks.complete');
// Store course user courses
Route::post('/courses/{courseId}/enroll', [MemberController::class, 'enrollCourse'])->name('courses.enroll');

// Store notes
Route::post('/memberdashboard/notes', [MemberController::class, 'storeNote'])->name('notes.store');






// Delete Routes

// Delete posts 
Route::delete('/webpages/community/{post}', [PostController::class, 'postDestroy'])->name('posts.postDestroy');
// Delete feedbacks 
Route::delete('/webpages/feedback/{feedback}', [FeedbackController::class, 'feedbackDestroy'])->name('feedbacks.feedbackDestroy');
// Delete user 
Route::delete('/users/{user}', [AdminController::class, 'userDestroy'])->name('users.destroy');
// Delete catalogs
Route::delete('/catalogs/{catalog}', [AdminController::class, 'catalogDestroy'])->name('catalogs.destroy');
// Delete Courses
Route::delete('/courses/{course}', [AdminController::class, 'courseDestroy'])->name('courses.destroy');
// Delete comments
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
// Delete Replies
Route::delete('/replies/{reply}', [CommentController::class, 'replyDestroy'])->name('replies.destroy');
// Delete celebrities
Route::delete('/celebrities/{celebrity}', [AdminController::class, 'celebrityDestroy'])->name('celebrities.destroy');
// Delete Developers Tool
Route::delete('/developertools/{developertool}', [AdminController::class, 'devetoolDestroy'])->name('developertools.destroy');
// Delete Developers Tool Item
Route::delete('/developertoolitems/{developertoolitem}', [AdminController::class, 'developertoolitemDestroy'])->name('developertoolitem.destroy');



// Delete Developers Tool Item
Route::delete('/coursetasks/{task}', [AdminController::class, 'taskDestroy'])->name('coursetask.destroy');

Route::delete('/tasks/{taskId}', [AdminController::class, 'deleteUserTask'])->name('tasks.delete');

Route::delete('/courses/{courseId}/unenroll', [MemberController::class, 'unenrollCourse'])->name('courses.unenroll');

Route::delete('/notes/{note}', [MemberController::class, 'noteDestroy'])->name('notes.destroy');







//Edit Routes

// Edit & Update posts
Route::get('/webpages/community/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/webpages/community/{post}', [PostController::class, 'update'])->name('post.update');

// Edit & Update Celebrities
Route::get('/webpages/celebrities/{celebrity}/edit', [AdminController::class, 'celebrityEdit'])->name('celebrity.edit');
Route::put('/webpages/celebrities/{celebrity}', [AdminController::class, 'celebrityUpdate'])->name('celebrity.update');

// Edit & Update developer tool
Route::get('/webpages/deveitems/{devetool}/editDeveToo', [AdminController::class, 'deveToolEdit'])->name('devetool.edit');
Route::put('/webpages/deveitems/{devetool}', [AdminController::class, 'deveToolUpdate'])->name('devetool.update');


// Edit & Update Celebrities
Route::get('/webpages/tasks/{task}/edit', [AdminController::class, 'taskEdit'])->name('task.edit');
Route::put('/webpages/tasks/{task}', [AdminController::class, 'taskUpdate'])->name('task.update');

// Edit & Update courses
Route::get('/webpages/courses/{course}/edit', [AdminController::class, 'courseEdit'])->name('course.edit');
Route::put('/webpages/courses/{course}', [AdminController::class, 'courseUpdate'])->name('course.update');

// Edit & Update catalog
Route::get('/webpages/courses/{catalog}/editCatalog', [AdminController::class, 'catalogEdit'])->name('catalog.edit');
Route::put('/webpages/catalogs/{catalog}', [AdminController::class, 'catalogUpdate'])->name('catalog.update');

// Edit & Update courses content
Route::get('/webpages/coursescontent/{content}/edit', [AdminController::class, 'coursesContentEdit'])->name('coursescontent.edit');
Route::put('/webpages/coursescontent/{content}', [AdminController::class, 'coursesContentUpdate'])->name('coursescontent.update');



// Display Routs

// Display Course Menu Details 
Route::get('/webpages/coursemenu', [CourseController::class, 'courseMenu'])->name('course.menu');
// Display feedback Details 
Route::get('/webpages/feedback', [CourseController::class, 'feedback'])->name('feedback');
// Display community Details 
Route::get('/webpages/community', [CourseController::class, 'community'])->name('community');
// Display community Details 
Route::get('/webpages/quiz', [CourseController::class, 'quiz'])->name('quiz');
// Display community Details 
Route::get('/webpages/celebrities', [CourseController::class, 'celebrities'])->name('celebrities');
// Display about Details 
Route::get('/webpages/about', [CourseController::class, 'about'])->name('about');
// Display terms of services
Route::get('/webpages/terms', [CourseController::class, 'terms'])->name('terms');
// Display policy
Route::get('/webpages/policy', [CourseController::class, 'policy'])->name('policy');
// Display accessibility Details 
Route::get('/webpages/accessibility', [CourseController::class, 'accessibility'])->name('accessibility');
// Display developer tools item details
Route::get('/tools/{toolId}/items', [CourseController::class, 'showItems'])->name('tools.items.new');
// Display course Content
Route::get('/courses/{courseId}/contents', [CourseController::class, 'showCourseContent'])->name('courses.contnet.new');
// Display course Content
Route::get('/tasks/{courseId}/tasks', [CourseController::class, 'showCourseTasks'])->name('tasks.task.new');



Route::get('/search', [PostController::class, 'search'])->name('search');





















// User Roles Admin/Member auth
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/memberdashboard', [MemberController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('memberdashboard');















// Routes related to ProfileController
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';












