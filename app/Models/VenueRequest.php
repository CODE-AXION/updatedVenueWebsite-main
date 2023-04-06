<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueRequest extends Model
{
    use HasFactory;
    protected $table = 'venue_request';
    protected $fillable = ['username','email','venue_name','capacity','price','category_id','event_id','location_id'];
}
