<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // str_slug('Welcome')
        
        $list='[{"name":"Italian Cucumber Sandwiches","tags":"sand,vg,ccmmbr,smsz"},{"name":"Tomato Avocado Sandwich","tags":"sand,tmt,vg,smsz"},{"name":"California Grilled Veggie Sandwich","tags":"sand,vg,ccmmbr,tmt,lrgsz,cheese"},{"name":"Vegetarian Open Faced Sandwich","tags":"sand,tmt,vg,smsz,cheese,ccmmbr,mush,eggplnt"},{"name":"Mamas Best Broiled Tomato Sandwich","tags":"sand,vg,smsz,cheese,ccmmbr"},{"name":"Slow Cooker Italian Beef for Sandwich","tags":"sand,vg,smsz,cheese,ccmmbr"},{"name":"Easy Ham and Cheese Appetizer Sa","tags":"sand,nvg,prk,cheese,smsz"},{"name":"Hot Ham and Cheese Sandwiches","tags":"sand,nvg,prk,cheese,lrgsz"},{"name":"Delicious Ham and Potato Soup","tags":"sp,nvg,prk,ptato,smsz,chckn"},{"name":"Mulligatawny Soup","tags":"sp,nvg,tmt,lrgsz,chckn"},{"name":"Italian Sausage Soup with Tortellini","tags":"sp,nvg,tmt,lrgsz,bf"},{"name":"Creamy Chicken and Wild Rice Soup","tags":"sp,nvg,lrgsz,chckn"}]';
        foreach(json_decode($list,true) as $json)
        {
            DB::table('food')->insert([
            'name'      => $json['name'],
            'desc'       => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta dolorum eum et inventore adipisci blanditiis iure in eligendi, quo at dolores repudiandae porro neque provident cumque, iusto molestias a veritatis.',
            'Calories'    => '0',
            'img'=>'0',
            'Totfat'=>'0',
            'Tags'=>$json['tags'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }
    }
}
