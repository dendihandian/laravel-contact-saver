<?php

namespace App\Models;

class SocialAccount extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
