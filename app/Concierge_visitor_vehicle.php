<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concierge_visitor_vehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_visitor_id', 'register_type', 'date_time', '_status',
    ];
}
