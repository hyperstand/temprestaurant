<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    public function title_tag()
    {
        return $this->belongsTo(tag_title::class);
    }
}
