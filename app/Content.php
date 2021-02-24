<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title', 'episode', 'timelength', 'cost_per_stream', 'release_date', 'distributer', 'censor_rating'
    ];
}
