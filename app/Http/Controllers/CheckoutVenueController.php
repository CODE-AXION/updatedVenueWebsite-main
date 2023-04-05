<?php

namespace App\Http\Controllers;

use App\Models\CheckoutVenue;
use App\Models\Venue;
use Illuminate\Http\Request;

class CheckoutVenueController extends Controller
{

    public function checkout(Request $request,$id)
    {
        $request->validate([
            'occasion' => ['required'],
            'capacity' => ['required'],
            'date' => ['required'],
            'name' => ['required'],
            'phone' => ['required','numeric','digits:10'],
            'email' => ['required','email'],
        ]);

        $venue = Venue::where('id',$id)->first();

        $checkoutVenue = new CheckoutVenue();
        $checkoutVenue->event_id = $request->occasion;
        $checkoutVenue->service_id = $request->service_id;
        $checkoutVenue->plan_id = $request->plan_id ?? null;
        $checkoutVenue->no_of_guests = $request->capacity;
        $checkoutVenue->date = $request->date;
        $checkoutVenue->name = $request->name;
        $checkoutVenue->phone = $request->phone;
        $checkoutVenue->email = $request->email;
        $checkoutVenue->venue_id = $id;
        $checkoutVenue->amount = $venue->price;
        $checkoutVenue->user_id = $venue->user_id ?? null;
        $checkoutVenue->save();

        return redirect()->route('venue.details',['id' => $venue->id,'checkout' => $venue->price * 100, 'checkout_pay' => true]);
    }
}
