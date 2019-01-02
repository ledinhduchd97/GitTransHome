<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasktodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasktodos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            // $table->string('customer_name');
            // $table->string('birthday')->nullable();
            // $table->string('client_type')->nullable();
            $table->string('to_do_type');
            $table->dateTime('start_task');
            $table->dateTime('duration')->nullable();
            $table->string('age')->nullable();
            // $table->string('update')->nullable();
            $table->dateTime('deadline');
            $table->string('note');
            $table->tinyInteger('ranking'); //Độ quan trọng của công việc
            $table->tinyInteger('status'); //Trạng thái
            $table->string('assigned'); //tên nhà đầu tư
            $table->integer('customer_id')->unsigned()->index()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */ 
    public function down()
    {
        Schema::dropIfExists('tasktodos');
    }
}
