<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Services\ImageUploadService;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
 

        return view('admin.events.index')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEvent()
    {
        
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEvent(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $event = new Event();
        $event->name = $request->name;

        (new ImageUploadService($event,$request->image,'event_images'))->uploadImage()->storeImageDB('image');
        
        $event->save();

        $event->save();

        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function editEvent(Request $request,$event_id)
    {
        $event = Event::where('id',$event_id)->first();
        
        return view('admin.events.edit')->with('event',$event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function updateEvent(Request $request,$event_id)
    {
        $event = Event::where('id',$event_id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $event->update(['name' => $request->name]);

        (new ImageUploadService($event,$request->image,'event_images'))->deleteImage('image')->uploadImage()->storeImageDB('image');
        
        $event->save();

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function deleteEvent(Request $request, $event_id)
    {
        $event = Event::where('id',$event_id)->first();

        $venues = Venue::where('id',$event->id)->get();

        foreach ($venues as $venue ) {
            $venue->services()->detach();
            $venue->delete();
        }

        $event->delete();

        return redirect()->route('category.index');
    }
}
