<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function indexFeedback()
{
    $feedbacks = Feedback::all(); // Fetch all feedbacks

    return view('webpages.feedback', ['feedbacks' => $feedbacks]);
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
public function storeFeedback(Request $request)
{
    // Check if the user is authenticated
    if (!auth()->check()) {
        return back()->with('error', 'Please log in / sign up to submit feedback.');
    }
    // Validate the request
    $request->validate([
        'message' => 'required',
        'title' => 'required',
        'rating' => 'required|integer|min:1|max:5',
    ]);

    // Store the feedback in the database
    Feedback::create([
        'user_id' => auth()->id(), // If feedback is associated with users
        'message' => $request->input('message'),
        'title' => $request->input('title'),
        'rating' => $request->input('rating'),
    ]);

     // Redirect to feedback page with all feedbacks
   return redirect()->route('feedback.store')->with('success', 'Thanks for your Feedback.');
}

    /**
     * Display the specified resource.
     */
public function showUserFeedback($userId)
{
    $feedbacks = Feedback::all(); // Retrieve all books
    $users = User::all(); // Retrieve all users

    // Pass both books and users data to the view
   
    
    return view('webpages.feedback', ['user' => $user, 'feedbacks' => $feedbacks]);
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
public function feedbackDestroy(Feedback $feedback)
{
    $feedback = Feedback::findOrFail($feedback->id);
    
$feedback->delete();

session()->flash('success', 'Feedback deleted successfully.');
session()->flash('operation', 'deleted');
session()->flash('id', $feedback->id);

return back();

}



}
