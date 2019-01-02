<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageFreecashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_freecashes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('form_information_title_h3');
            $table->text('form_information_title_h4');
            $table->text('how_we_item_title_1');
            $table->text('how_we_item_desc_1');
            $table->text('how_we_item_title_2');
            $table->text('how_we_item_desc_2');
            $table->text('how_we_item_title_3');
            $table->text('how_we_item_desc_3');
            $table->text('how_we_table_title');
            $table->text('how_we_table_desc');
            $table->text('modal_map_title');
            $table->text('modal_map_desc');
            $table->text('modal_thanks_title');
            $table->text('modal_thanks_desc');
            $table->string('modal_thanks_phone');
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
        Schema::dropIfExists('page_freecashes');
    }
}
