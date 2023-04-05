<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Service;
use App\Models\Plan;
use App\Models\Location;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexVenue()
    {
        $venues = Venue::all();

        return view('admin.venues.index')->with('venues',$venues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createVenue ()
    {
        $events = Event::all();
        $categories = Category::all();
        $locations = Location::all();

        return view('admin.venues.create')->with('locations',$locations)->with('events',$events)->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeVenue(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'category' => 'required',
            'event' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        $venue = new Venue();
        $venue->name = $request->name;
        $venue->price = $request->price;
        $venue->capacity = $request->capacity;
        $venue->category_id = $request->category;
        $venue->event_id = $request->event;
        $venue->location_id = $request->location;
        $venue->description = $request->description;

        (new ImageUploadService($venue,$request->image,'venue_images'))->deleteImage('image')->uploadImage()->storeImageDB('image');


        $venue->save();

        return redirect()->route('create.plans',['id' => $venue->id]);
    }

    public function navigatePlan(Request $request)
    {
        $venue = Venue::where('id',$request->id)->first();

        return view('admin.venues.navigate_plan')->with('venue',$venue);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function addServices(Request $request)
    {
        $venue = Venue::where('id',$request->venue_id)->first();
        $services = Service::all();
        $plans = Plan::all();

        return view('admin.venues.add-services')->with('plans',$plans)->with('venue',$venue)->with('services',$services);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function storeServices(Request $request)
    {
        $request->validate([

            'plan_id' => 'required',
            'service_id' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',


        ],[
            'plan_id.required' => 'Plans fields is required',
            'service_id.required' => 'Service field is required',
            'service_description.required' => 'Service Description field is required',
            'service_price.required' => 'Service Price fields is required',
        ]);


        $venue = Venue::where('id',$request->venue_id)->first();

        $venue->services()->attach($request->service_id,['plan_id' => $request->plan_id , 'service_price' => $request->service_price, 'service_description' => $request->service_description]);

        //$plan = Plan::where('id',$request->plan_id)->first();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function editVenue(Request $request,$venue_id)
    {
        $venue =  Venue::where('id',$venue_id)->first();
        $events = Event::all();
        $categories = Category::all();
        $locations = Location::all();
        return view('admin.venues.edit')->with('locations',$locations)->with('venue',$venue)->with('categories',$categories)->with('events',$events);
    }

    public function updateVenue(Request $request,$venue_id)
    {
        $venue = Venue::where('id',$venue_id)->first();

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'capacity' => 'required',
            'category' => 'required',
            'event' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        $venue->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'event_id' => $request->event,
            'category_id' => $request->category,
            'location_id' => $request->location,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        (new ImageUploadService($venue,$request->image,'venue_images'))->deleteImage('image')->uploadImage()->storeImageDB('image');
        
        $venue->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */

    public function deleteVenueService(Request $request,$venue_id,$service_id)
    {

        $venue = Venue::where('id',$venue_id)->first();
        $venue->services()->detach($service_id);
        return redirect()->back();
    }

    public function deleteVenue(Request $request,$venue_id)
    {
        $venue = Venue::where('id',$venue_id)->first();
        $venue->services()->detach();
        $venue->delete();
        return redirect()->route('venue.index');
    }
}
