<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventInstanceExceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_instance_exceptions', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            $table->boolean('is_rescheduled')->nullable();
            $table->boolean('is_cancelled')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->boolean('is_full_day_event');
            $table->integer('owner');
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
        Schema::dropIfExists('event_instance_exceptions');
    }
}
