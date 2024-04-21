<?php

namespace App\Http\Controllers;

use App\Models\BlogReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogReportController extends Controller
{
    public function index(){
        $reports = BlogReport::all();
        return view('report.index', compact('reports'));
    }

    public function store(Request $request)
    {

        $rules = [

            'issue_type' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $report = new BlogReport();

        $report->post_id = $request->post_id;
        $report->issue_type = $request->issue_type;
        $report->title = $request->title;
        $report->description = $request->description;


        $report->student_id = Auth::user()->id;


        $report->save();

        return redirect()->back()->with('message', 'Report submitted successfully!');
    }

}
