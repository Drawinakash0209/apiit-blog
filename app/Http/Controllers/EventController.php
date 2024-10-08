<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EventFormRequest;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

    //Display all events
    public function index(){
        return view('events.events-page', [
            
            'events' => Event::all(),
            'special_events' => Auth::check() ? Event::where('type_of_event', Auth::user()->school)->get() : null,

        ]);
    }

    //display single event
    public function show($event_id){
        $event = Event::find($event_id);
        return view('events.show', compact('event'));
    }

    //Display all user posted events
    public function manage(){
        return view('events.index', [
            'events' =>  Auth::user()->events
        ]);
    }


    //Delete event
    public function destroy($event_id){
        $event = Event::find($event_id);
        $event->delete();
        return redirect('/events')->with('message', 'Event deleted successfully');
    }
    //Display edit form
    public function edit($event_id){
        $event = Event::find($event_id);
        return view('events.edit', compact('event'));
    }

    //Update event
    public function update(EventFormRequest $request, $event_id){
        $data = $request->validated();
        $event = Event::find($event_id);
        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->start_date = $data['start_date'];
        $event->end_date = $data['end_date'];
        $event->type_of_event = $data['type_of_event'];
        $event->location = $data['location'];
        $event->start_time = $data['start_time'];

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/event/', $filename);
            $event->image = $filename;

        }


        $event->update();
        return redirect('/manage-events')->with('message', 'Event updated successfully');}


    //Display event creation page
    public function create()
    {
        return view('events.create');
    }

    public function store(EventFormRequest $request){


        $data = $request->validated();
        $event = new Event;
        $event->name = $data['name'];
        $event->description = $data['description'];
        $event->start_date = $data['start_date'];
        $event->end_date = $data['end_date'];
        $event->type_of_event = $data['type_of_event'];
        $event->location = $data['location'];
        $event->start_time = $data['start_time'];

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/event/', $filename);
            $event->image = $filename;

        }


        $event->created_by = Auth::user()->id;

        $event->save();
        return redirect('/manage-events')->with('message', 'Post added successfully');


    }

    //Edit function (show form to edit event)


}
