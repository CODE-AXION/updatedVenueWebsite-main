<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Venue;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index')->with('locations',$locations);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLocation()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLocation (Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $location = new Location();
        $location->name = $request->name;

        (new ImageUploadService($location,$request->image,'location_images'))->uploadImage()->storeImageDB('image');

        $location->save();

        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function editLocation(Request $request,$location_id)
    {
        $location = Location::where('id',$location_id)->first();
        
        return view('admin.locations.edit')->with('location',$location);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function updateLocation(Request $request,$location_id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $location = Location::where('id',$location_id)->first();
        $location->update([
            'name' => $request->name,
        ]);

        (new ImageUploadService($location,$request->image,'location_images'))->deleteImage('image')->uploadImage()->storeImageDB('image');
        $location->save();

        return redirect()->route('location.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function deleteLocation(Request $request, $location_id)
    {
        $location = Location::where('id',$location_id)->first();

        $venues = Venue::where('id',$location->id)->get();

        foreach ($venues as $venue ) {
            $venue->services()->detach();
            $venue->delete();
        }

        $location->delete();

        return redirect()->route('location.index');
    }
}
