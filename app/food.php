<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class food extends Model
{   
    
    public function turnpage($limit)
    {
        return food::paginate($limit); //Use paginate here.
    }   
}
