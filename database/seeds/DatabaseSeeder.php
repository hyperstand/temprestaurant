<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(FoodTableSeeder::class);
        // $this->call(TagTableSeed::class);
        $this->call(UserSeeder::class);

    }
}
