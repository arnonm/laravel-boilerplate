<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('location_id')->nullable();
//            $table->date('start_date');
//            $table->date('end_date');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->boolean('is_full_day_event')->default(false);
            $table->boolean('is_recurring')->default(false);
            $table->integer('parent_event_id')->nullable();
            // next two lines are part of QuickAdmin implementation
            $table->string('recurrence')->nullable();
            $table->unsignedInteger('event_id')->nullable();
            $table->foreign('event_id')->references('id')->on('events');
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
        Schema::dropIfExists('events');
    }
}
