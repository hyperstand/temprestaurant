<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Food extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('desc', 255);
            $table->string('img');
            $table->string('Calories');
            $table->string('Totfat');
            $table->string('Tags');
            $table->timestamps();
        });
        // id`, `name`, `desc`, `img`, `Calories`, `Totfat`, `Tags`
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
