<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Job;

class JobController extends Controller
{
    //Function to display all jobs
    public function index()
    {
        $jobs = Job::all(); // Use the Job model to retrieve all jobs
        return view('jobs.index', compact('jobs'));
    }

    //Function to display form to create jobs
    public function create()
    {
        return view('jobs.create');
    }

    //Function to store jobs
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'form_link' => 'required|url',
            'description' => 'required|string',
            'job_type' => 'required|in:internship,part-time,full-time,freelance,contract,',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $job = new Job();

        $job->name = $request->name;
        $job->form_link = $request->form_link;
        $job->description = $request->description;
        $job->job_type = $request->job_type;


        $job->save();

        return redirect()->back()->with('success', 'Job created successfully');
    }


}
