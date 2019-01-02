<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // 
            $table->string('code'); //
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('address'); //
            $table->integer('number_bedroom'); // 
            $table->integer('number_bathroom'); //
            $table->double('area_gross_floor',8,2); //diện tích sử dụng được
            $table->double('site_area',8,2); //diện tích toàn nhà
            $table->double('price', 12, 2); //
            $table->longText('description'); //
            $table->string('phone'); //
            $table->string('area'); // khu vực của ngôi nhà
            $table->string('zipcode'); //
            $table->integer('builded_year'); //
            $table->longText('note')->nullable(); // 
            $table->string('video'); //
            $table->string('brokerage'); //
            $table->string('mls'); //
            $table->string('license'); //
            $table->string('agent'); //
            $table->integer('unit'); //
            $table->tinyInteger('status');
            $table->tinyInteger('active_status');
            $table->integer('user_update')->unsigned()->index()->nullable();
            $table->foreign('user_update')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('houses');
    }
}
