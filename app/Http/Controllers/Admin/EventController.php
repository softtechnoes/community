<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
   
    public function index()
    {
        return view('admin.pages.event');
    }
    public function event_list()
    {
        $events =  Event::get();
        return view('admin.pages.eventlist', compact('events'));
    }
    public function store(Request $request) {
      
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'place' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'charge' => 'required',
        ]);

        $event =  new Event();
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'mimes:png,jpg'],
            ]);

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('admin/event/', $filename);
            $event->image = $filename;
        }
        $event->name =  $request->name;
        $event->description =  $request->description;
        $event->date =  $request->date;
        $event->time =  $request->time;
        $event->place =  $request->place;
        $event->long =  $request->long;
        $event->lat =  $request->lat;
        $event->charge =  $request->charge;

        try {
            $event->save();
            return redirect()->route('event_list')->with('status', 'Event Has been added Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', $th->getMessage());
        }

    }

    public  function edit($id)
    {
        $event_edit =  Event::find($id);
        if($event_edit) {
            $event = Event::get();
            return view('admin.pages.event', compact('event_edit', 'event'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'place' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'charge' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'mimes:png,jpg'],
            ]);

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('admin/event/', $filename);
            Event::where('id', $id)->update([
                'image' =>  $filename,
            ]);
        }

        Event::where('id', $id)->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'date' => $request['date'],
            'time' => $request['time'],
            'place' => $request['place'],
            'long' => $request['long'],
            'lat' => $request['lat'],
            'charge' => $request['charge'],
        ]);

       try {
        return redirect()->route('event_list')->with('status', 'Event has been successfully updated!');
       } catch (\Throwable $th) {
           return redirect()->back()->with('status' , 'Server error');
       }
    }

    public function remove_event($id)
    {
        $event =  Event::find($id);
        $event_image =  Event::select('image', 'name')->where('id', $id)->first();
        dd($event_image);

        if(!empty($event_image)) {
            return response()->json(['event_image' =>  $event_image]);
        }
        
        if(!empty($event)) {
            $event->delete();
            return response()->json(['event' =>  $event]);
        }

        
    }
}
