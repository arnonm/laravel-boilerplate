<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecurringPatternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recurring_patterns', function (Blueprint $table) {
            $table->id();
            $table->integer('recurring_type_id');
            $table->smallInteger('separation_count')->nullable();
            $table->smallInteger('max_num_of_occurrences')->nullable();
            $table->smallInteger('day_of_week')->nullable();
            $table->smallInteger('week_of_month')->nullable();
            $table->smallInteger('day_of_month')->nullable();
            $table->smallInteger('month_of_year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recurring_patterns');
    }
}
