<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->string("website_name");
            $table->longText("description")->nullable();
            $table->string("logo_header");
            $table->string("logo_footer");
            $table->text("thank_you");
            $table->text("sell_my_home");
            $table->string("phone");
            $table->string("email");
            $table->string("lisence");
            $table->string("address");
            $table->string("facebook");
            $table->string("instagram");
            $table->string("twitter");
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
        Schema::dropIfExists('set_ups');
    }
}
