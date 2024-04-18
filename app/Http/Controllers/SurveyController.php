<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SurveyFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::all();
        return view('survey.index' , compact('surveys'));
    }

    public function create()
    {
        return view('survey.create');
    }

    public function update(Request $request)
    {
        $data = new survey;
        $data->name = $request->name;
        $data->form_link = $request->form_link;
        $data->description = $request->description;
        $data->crated_by =  Auth::user()->id;
        $data->cb_number = Auth::user()->cb_number;
        $data->status = $request = 1;
        
        
        $data->save();
        
        return redirect('/survey/manage')->with('message', 'Survey added successfully');
    }

    // public function store(SurveyFormRequest $request)
    // {

    //     $data = $request->validated();

    //     $survey = new Survey;
    //     $survey->name = $data['name'];
    //     $survey->slug = $data['slug'];
    //     $survey->description = $data['description'];
    //     $survey->form_link = $data['form_link'];
    //     $survey->meta_title = $data['meta_title'];
    //     $survey->meta_description = $data['meta_description'];
    //     $survey->meta_keywords = $data['meta_keywords'];
    //     $survey->crated_by = 0;//Auth::user()->id;
    //     $survey->cb_number = $data['cb_number'];
        
    //     $survey->save();

    //     return redirect('/survey')->with('message', 'Survey added successfully');

    // }

    public function edit($survey_id)
    {
        $survey = Survey::find($survey_id);
        return view('survey.edit', compact('survey'));
    }

    public function editupdate(SurveyFormRequest $request, $survey_id)
    {
        // dd($request->name);

        
        $data = $request->validated();

        $post = Survey::find($survey_id);
        $post->name = $data['name'];
        $post->form_link = $data['form_link'];
        $post->description = $data['description'];
        $post->cb_number = $data['cb_number'];
        $post->status = $request->status == true ? '0':'1';
        
        // dd($post);
        
        $post->update();

        return redirect('/survey')->with('message', 'survey updated successfully');

    }

    public function show()
    {
        $data = Survey::latest()->where('status', 0)->get();
        return view('survey.show', compact('data'));

       
    }

    public function destroy($survey_id)
    {
        $survey = Survey::find($survey_id);
        // $survey->delete();
        // return redirect('/survey')->with('message', 'Survey deleted successfully');
        if($survey)
        {
            $survey->delete();
            return redirect('/survey')->with('message', 'Survey deleted successfully');
        }
        else
        {
            return redirect('/survey')->with('message', 'No Survey found');
        }
    }

    public function manage(){
        return view('survey.surveymanage', [
            'surveys' => Auth::user()->survey    

        ]);
    }
}
