<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellmyhomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellmyhomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('note');
            $table->string('title_1');
            $table->text('description_1');
            $table->string('image_1');
            $table->string('title_image_1');
            $table->text('description_image_1');
            $table->string('image_2');
            $table->string('title_image_2');
            $table->text('description_image_2');
            $table->string('image_3');
            $table->string('title_image_3');
            $table->text('description_image_3');
            $table->string('title_2');
            $table->text('description_2');
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
        Schema::dropIfExists('sellmyhomes');
    }
}
