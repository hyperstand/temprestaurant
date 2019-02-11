<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\tag_title;

class TagTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run(tag_title $tt)    
    {   
        $list='[{"name":"Non-Vegetarian","value":"nvg","title":"1"},{"name":"Vegetarian","value":"vg","title":"1"},{"name":"Drink","value":"drnk","title":"1"},{"name":"Pasta","value":"psta","title":"2"},{"name":"Sandwich","value":"sand","title":"2"},{"name":"soup","value":"sp","title":"2"},{"name":"Cake","value":"cke","title":"3"},{"name":"Crepe","value":"crpe","title":"3"},{"name":"White","value":"whscs","title":"4"},{"name":"Red","value":"rdscs","title":"4"},{"name":"No Sauce","value":"nscs","title":"4"},{"name":"Small","value":"smsz","title":"5"},{"name":"Large","value":"lrgsz","title":"5"},{"name":"Pork","value":"prk","title":"6"},{"name":"Chicken","value":"chckn","title":"6"},{"name":"Beef","value":"bf","title":"6"},{"name":"Fish","value":"fsh","title":"6"},{"name":"Tomatoes","value":"tmt","title":"7"},{"name":"Mushroom","value":"mush","title":"7"},{"name":"Carrot","value":"cart","title":"7"},{"name":"Potato","value":"ptato","title":"7"},{"name":"Cucumber","value":"ccmmbr","title":"7"},{"name":"Eggplant","value":"eggplnt","title":"7"},{"name":"Vanilla","value":"vnila","title":"8"},{"name":"Fruit","value":"frt","title":"8"},{"name":"Chocolate","value":"choc","title":"8"},{"name":"Cinamon","value":"cina","title":"8"},{"name":"Nutella","value":"nutela","title":"8"},{"name":"Carrot","value":"cartfil","title":"8"},{"name":"Cheese","value":"cheese","title":"9"},{"name":"tofu","value":"tfu","title":"9"}]';
        // $data=json_decode($list);
        // echo gettype();
        foreach(json_decode($list,true) as $json)
        {
            DB::table('tags')->insert([
            'name'=> $json['name'],
            'value'=> $json['value'],
            'title_id'=>tag_title::where('id', $json['title'])->first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }

    }
}
