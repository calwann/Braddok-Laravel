<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concierge_vehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vehicle_id', 'user_id_boss', 'user_id_driver', 'register_type', 'date_time', 'odometer', '_status',
    ];
}
