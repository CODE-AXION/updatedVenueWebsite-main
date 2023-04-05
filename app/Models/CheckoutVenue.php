<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutVenue extends Model
{
    use HasFactory;

    protected $table = 'checkout_venue';

    protected $fillable = ['name','user_id','no_of_guests','date','event_id','phone','email','plan_id','venue_id','service_id'];


}
