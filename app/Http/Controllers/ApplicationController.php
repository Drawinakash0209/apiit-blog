<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Job;


class ApplicationController extends Controller
{
    public function apply(Request $request, $job_id)
    {
        $job = Job::find($job_id);

        if(!$job) {
            return redirect()->back()->with('message', 'Job not found');
        }

        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,pdf,doc,docx,txt|max:2048',
        ]);

        // Handle file upload
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/application', $filename);

            // Create application
            $application = new Application;
            $application->job_id = $job->id;
            $application->user_id = auth()->id();
            $application->name = $validatedData['name'];
            $application->phone = $validatedData['phone'];
            $application->email = $validatedData['email'];
            $application->address = $validatedData['address'];
            $application->image = 'uploads/application/' . $filename;
            $application->save();

            return redirect()->back()->with('success', 'Application submitted successfully');
        }

        return redirect()->back()->with('error', 'Failed to submit application');
    }


    public function viewApplications($job_id)
    {
        $job = Job::find($job_id);

        if (!$job) {
            return redirect()->back()->with('message', 'Job not found');
        }

        $applications = Application::where('job_id', $job_id)->with('user')->get();

        return view('jobs.applications', compact('job', 'applications'));
    }

    public function applications(Request $request)
    {
        $sortField = $request->get('sortField', 'id');
        $sortDirection = $request->get('sortDirection', 'asc');

        $validSortFields = ['id', 'name', 'email', 'phone', 'address', 'created_at', 'job_name'];
        if (!in_array($sortField, $validSortFields)) {
            $sortField = 'id';
        }

        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc';
        }

        $applications = Application::leftJoin('jobs', 'applications.job_id', '=', 'jobs.id')
            ->select('applications.*', 'jobs.name as job_name')
            ->orderBy($sortField, $sortDirection)
            ->get();

        return view('jobs.application', compact('applications', 'sortField', 'sortDirection'));
    }

    public function deleteApplication($application_id)
    {
        $application = Application::find($application_id);

        if (!$application) {
            return redirect()->back()->with('error', 'Application not found');
        }

        $application->delete();

        return redirect()->back()->with('success', 'Application deleted successfully');
    }
}
