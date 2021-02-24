<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {

    protected $fillable = ['address', 'email', 'footer_tagline', 'contact', 'logo', 'title','dashboard_title'];

}
