<?php

use Illuminate\Database\Seeder;


class TrainingCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factory('App\Models\TrainingCourse', 4)->create();
    }
}
