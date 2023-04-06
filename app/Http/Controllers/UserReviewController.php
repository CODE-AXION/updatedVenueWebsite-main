<?php

namespace App\Http\Controllers;

use App\Models\UserReview;

use App\Models\Event;
use App\Models\Category;
use App\Models\Location;
use App\Models\VenueRequest;

use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postUserReview(Request $request)
    {
        $request->validate([
            'email' => ['required','email'],
            'review' => 'required',
        ]);

        UserReview::Create([
            'email' => $request->email,
            'name' => $request->review
        ]);

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requestVenue()
    {
        $locations = Location::all();
        $events = Event::all();
        $categories = Category::all();

        return view('request-venue')->with('categories',$categories)->with('events',$events)->with('locations',$locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function requestVenueStore(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'email' => ['required','email'],
            'venue_name' => ['required'],
            'capacity' => ['required',],
            'price' => ['required'],
            'category' => ['required'],
            'event' => ['required'],
            'location' => ['required'],
        ]);

        $venueRequest = new VenueRequest();
        $venueRequest->username = $request->username; 
        $venueRequest->email = $request->email;
        $venueRequest->venue_name = $request->venue_name;
        $venueRequest->capacity = $request->capacity;
        $venueRequest->price = $request->price;
        $venueRequest->category_id = $request->category;
        $venueRequest->event_id = $request->event;
        $venueRequest->location_id = $request->location;
        $venueRequest->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function show(UserReview $userReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function edit(UserReview $userReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserReview $userReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserReview  $userReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserReview $userReview)
    {
        //
    }
}
