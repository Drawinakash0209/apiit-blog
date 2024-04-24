<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SurveyFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Survey;

class SurveyController extends Controller
{
    //Function to display all surveys
    public function index()
    {
        $surveys = Survey::all();
        return view('survey.index' , compact('surveys'));
    }


    //Function to display form to create survey
    public function create()
    {
        return view('survey.create');
    }


    //Function to store survey
    public function update(SurveyFormRequest $request)
    {
        $survey = $request->validated();
        $data = new survey;
        $data->name =   $survey['name'];
        $data->form_link = $survey['form_link'];
        $data->description = $survey['description'];
        $data->crated_by =  Auth::user()->id;
        $data->cb_number = Auth::user()->cb_number;
        $data->status = $request = 1;


        $data->save();

        return redirect('/survey/manage')->with('message', 'Survey added successfully');
    }


    //Function to display form to edit survey
    public function edit($survey_id)
    {
        $survey = Survey::find($survey_id);
        return view('survey.edit', compact('survey'));
    }

    //Function to update survey
    public function editupdate(SurveyFormRequest $request, $survey_id)
    {


        $data = $request->validated();

        $post = Survey::find($survey_id);
        $post->name = $data['name'];
        $post->form_link = $data['form_link'];
        $post->description = $data['description'];
        $post->status = $request->status == true ? '0':'1';
        $post->update();

        return redirect('/survey')->with('message', 'survey updated successfully');

    }

    //Function to display all surveys
    public function show()
    {
        $data = Survey::latest()->where('status', 0)->get();
        return view('survey.show', compact('data'));
    }

    //Function to delete survey
    public function destroy($survey_id)
    {
        $survey = Survey::find($survey_id);
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

    //Function to manage survey
    public function manage(){
        return view('survey.surveymanage', [
            'surveys' => Auth::user()->survey

        ]);
    }
}
