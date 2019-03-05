<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class booking extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

// >>> $user= new App\User()
// => App\User {#2932}
// >>> $user= $user::find(3)
// => App\User {#2935
//      id: 3,
//      fname: "cookie",
//      lname: "monster",
//      email: "chris@scotch.io",
//      phnnumber: "",
//      totalbooking: 0,
//      totaldelivery: 0,
//      created_at: "2019-02-17 03:13:39",
//      updated_at: "2019-02-17 03:13:39",
//    }
// >>> $user->booking
// => App\booking {#2931
//      id: 1,
//      booking_time: "13:00:00",
//      booking_num_people: "5",
//      booking_date: "2019-03-02",
//      booking_user_id: 3,
//      canceled: 0,
//      created_at: "2019-02-26 10:47:16",
//      updated_at: "2019-02-26 10:47:16",
//    }