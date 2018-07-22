<?php

namespace App\Models;

class Contact extends Model
{
    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
}
