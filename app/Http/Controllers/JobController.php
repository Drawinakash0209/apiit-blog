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
        $jobs = Job::all();
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

    //Function to display form to edit jobs
    public function edit($job_id)
    {
        $job = Job::find($job_id);
        return view('jobs.edit', compact('job'));
    }

    //Function to update job
    public function update(Request $request, $job_id)
    {
        $job = Job::find($job_id);
        if(!$job) {
            return redirect()->back()->with('error', 'Job not found');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'form_link' => 'required|url',
            'description' => 'required|string',
            'job_type' => 'required|in:internship,part-time,full-time,freelance,contract,',
        ]);

        $job->name = $request->name;
        $job->form_link = $request->form_link;
        $job->description = $request->description;
        $job->job_type = $request->job_type;

        $job->save();

        return redirect('/jobs')->with('success', 'Job Details updated successfully');
    }

    //Function to delete job
    public function destroy(Request $request, $job_id)
    {
        $job = Job::find($job_id);
        if($job)
        {
            $job->delete();
            return redirect('/jobs')->with('success', 'Job Details deleted successfully');
        }
        else
        {
            return redirect('/jobs')->with('message', 'No Job found');
        }
    }

    public function show()
    {
        $jobs = Job::latest()->get();
        return view('jobs.show', compact('jobs'));
    }
}
