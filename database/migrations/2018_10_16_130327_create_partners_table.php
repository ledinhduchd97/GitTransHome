<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->dateTime('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('partner_type')->nullable();  //0 là normal , 1 là vip
            $table->string('status')->nullable();
            $table->integer('status_recycle')->default(1);
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
        Schema::dropIfExists('partners');
    }
}
