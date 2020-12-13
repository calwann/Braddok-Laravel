<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concierge_visitor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'identity', 'phone', 'birth', '_status',
    ];
}
