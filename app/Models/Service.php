<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','image_url','capacity','price'];

    public function venues()
    {
        return $this->belongsToMany(Venue::class,'venue_services','venue_id','service_id')->withPivot('plan_id');
    }
}
