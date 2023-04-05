<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\Event;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.users.index')->with('users',$users);
    }

    public function venueDetailsView(Request $request,$venue_id)
    {
        $venue = Venue::where('id',$venue_id)->first();
        $occasions = Event::all();

        $venueServices = $venue->services;

        return view('venue-details')->with('venueServices',$venueServices)->with('occasions',$occasions)->with('venue',$venue);
    }


    public function venueShop(Request $request)
    {
        $occasions = Event::all();
        $categories = Category::all();
        $locations = Location::all();

        if($request->has('event_id')){

            $event = Event::where('id',$request->event_id)->first();

            $venues = Venue::where('event_id',$request->event_id)->paginate(5);

        }elseif($request->has('category_id')){

            $category = Category::where('id',$request->category_id)->first();

            $venues = Venue::where('category_id',$request->category_id)->paginate(5);

        }elseif($request->has('location_id')){

            $location = Location::where('id',$request->location_id)->first();

            $venues = Venue::where('location_id',$request->location_id)->paginate(5);
        }
        else{
            $venues = Venue::paginate(5);
        }

        return view('shop-page')->with('locations',$locations)->with('location',$location ?? false)->with('event',$event ?? false)->with('category',$category ?? false)->with('venues',$venues)->with('categories',$categories)->with('occasions',$occasions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function homePage(Request $request)
    {
        $locations = Location::all();
        $venues = Venue::all();

        $categoryLocations = Location::where('image' ,'!=',NULL)->take(3)->get();

        $categoryEvents = Event::where('image','!=',NULL)->take(4)->get();

        return view('home')->with('categoryEvents',$categoryEvents)->with('venues',$venues)->with('categoryLocations',$categoryLocations)->with('locations',$locations);
    }

    public function searchVenueLocation(Request $request)
    {

        return redirect()->route('venue.shop',['location_id'=> $request->location]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
