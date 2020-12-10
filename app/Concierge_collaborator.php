<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concierge_collaborator extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'register_type', 'date_time', '_status',
    ];
}
