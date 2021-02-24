<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model {

    protected $fillable = [
        'user_id', 'content_id', 'stream_date', 'stream_time', 'stream_length', 'stream_rate'
    ];

}
