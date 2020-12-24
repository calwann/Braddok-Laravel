<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_visitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'license_plate', 'type', 'brand', 'model', '_status',
    ];
}
