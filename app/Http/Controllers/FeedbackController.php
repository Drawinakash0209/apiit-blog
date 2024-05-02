<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('feedback.index', [
            'feedbacks' => Feedback::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('feedback.show', [
        //     'feedback' => (new Feedback()),
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            //type required
            'type' => 'required',
            //content required
            'content' => 'required',
            //is_reviewed required
            // 'is_reviewed' => 'required',
        ]);

        Feedback::create($validated);

        return redirect()->route('feedback.status')->with('message', 'Feedback successfully created!');
        // return redirect()->route('user.status')->with('success', 'Registration successful. Please wait for the admin approval');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //return view feedback.show
         return view('feedback.show', [
            // 'feedback' => Feedback::findOrFail($id)
             'feedback' => (new Feedback()),
        ]);
    }

    public function showpending(){
        $pendingFeedbacks = Feedback::where('is_reviewed', false)->get();

        return view('feedback.pending', [
            'pendingfeedbacks' => $pendingFeedbacks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        return view('feedback.edit', [
            'feedback' => $feedback,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feedback $feedback)
    {
        $validated = $request->validate([
            //type required
            'type' => 'required',
            //content required
            'content' => 'required',
            //is_reviewed required
            'is_reviewed' => 'required',


        ]);

        $feedback->update($validated);

        return redirect()->route('feedback.index')->with('message', 'Feedback successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('feedback.index')->with('message', 'Feedback successfully deleted!');
    }
}
