<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag_title extends Model
{
    
    public function tags()
    {
       return $this->hasMany(tags::class,'title_id');
    }
    // public function getUserIdsAttribute()
    // {
    //     return $this->users->pluck('user_id');
    // }
}

// >>> $tag_1=new App\tags()
// => App\tags {#2928}
// >>> $tag_1->name="tag_1"
// => "tag_1"
// >>> $tag_1->value="tg1"
// => "tg1"
// >>> $tag_2=new App\tags()
// => App\tags {#2924}
// >>> $tag_2->name="tag_2"
// => "tag_2"
// >>> $tag_2->value="tg_2"
// => "tg_2"
// >>> $tag_title->tags()->saveMany([$tag_1,$tag_2])
// PHP Notice:  Undefined variable: tag_title in Psy Shell code on line 1
// >>> $tag_title= new App\tag_title()
// => App\tag_title {#2925}
// >>> $tag_title->tags()->saveMany([$tag_1,$tag_2])
// => [
//      App\tags {#2928
//        name: "tag_1",
//        value: "tg1",
//        title_id: null,
//        updated_at: "2019-02-03 22:50:19",
//        created_at: "2019-02-03 22:50:19",
//        id: 1,
//      },
//      App\tags {#2924
//        name: "tag_2",
//        value: "tg_2",
//        title_id: null,
//        updated_at: "2019-02-03 22:50:19",
//        created_at: "2019-02-03 22:50:19",
//        id: 2,
//      },
//    ]
// >>> $tag_title= new App\tag_title()
// => App\tag_title {#2926}
// >>> $tag_title=find(1)
// PHP Fatal error:  Call to undefined function find() in Psy Shell code on line 1
// >>> $tag_title=$tag_title:find(1)
// PHP Parse error: Syntax error, unexpected ':' on line 1
// >>> $tag_title=$tag_title::find(1)
// => App\tag_title {#2938
//      id: 1,
//      name: "type",
//      created_at: null,
//      updated_at: null,
//    }
// >>> $tag_title->tags()->saveMany([$tag_1,$tag_2])
// => [
//      App\tags {#2928
//        name: "tag_1",
//        value: "tg1",
//        title_id: 1,
//        updated_at: "2019-02-03 22:52:17",
//        created_at: "2019-02-03 22:50:19",
//        id: 1,
//      },
//      App\tags {#2924
//        name: "tag_2",
//        value: "tg_2",
//        title_id: 1,
//        updated_at: "2019-02-03 22:52:17",
//        created_at: "2019-02-03 22:50:19",
//        id: 2,
//      },
//    ]