<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckoutVenue;

class OrderController extends Controller
{
    public function orders()
    {
        $checkoutVenue = CheckoutVenue::all();

        return view('admin.orders.index')->with('checkoutVenues',$checkoutVenue);
    }
}
