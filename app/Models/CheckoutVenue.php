<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutVenue extends Model
{
    use HasFactory;

    protected $table = 'checkout_venue';

    protected $fillable = ['name','user_id','no_of_guests','date','event_id','phone','email','plan_id','venue_id','service_id'];


    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
