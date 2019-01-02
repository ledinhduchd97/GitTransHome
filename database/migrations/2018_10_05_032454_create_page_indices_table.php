<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageIndicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_indices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sell_content_question');
            $table->string('sell_content_title');
            $table->string('sell_content_btn');
            $table->string('about_us_title');
            $table->string('about_us_subtitle');
            $table->text('about_us_des');
            $table->string('partner_title');
            $table->string('partner_subtitle');
            $table->text('partner_des');
            $table->text('partner_menu__title_1');
            $table->text('partner_menu__des_1');
            $table->text('partner_menu__title_2');
            $table->text('partner_menu__des_2');
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
        Schema::dropIfExists('page_indices');
    }
}
