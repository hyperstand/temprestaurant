<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    public function user()
    {
        return $this->hasOne(booking::class);
    }
}