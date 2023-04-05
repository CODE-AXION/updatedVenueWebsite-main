<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['name','image','capacity','color_class','description','event_id','category_id','location_id','price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'venue_services','venue_id','service_id' )->withPivot('plan_id','service_price','service_description');
    }
}
