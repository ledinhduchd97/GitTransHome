<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTaskToDosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_task_to_dos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("customer_id");
            $table->string("title");
            // $table->integer("age");
            // $table->integer("update")->nullable();
            $table->string("type");
            $table->dateTime("deadline")->nullable();
            $table->integer("status")->nullable();
            $table->integer("ranking")->nullable();
            $table->string("note")->nullable();
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
        Schema::dropIfExists('customer_task_to_dos');
    }
}
