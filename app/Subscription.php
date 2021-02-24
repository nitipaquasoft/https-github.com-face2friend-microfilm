<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'user_id', 'plan_id', 'valid_till'
    ];
}
