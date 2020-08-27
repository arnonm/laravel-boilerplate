<?php

use App\Models\Placement;
use Illuminate\Database\Seeder;

class TestingSeeder extends Seeder
{

    private function SeedUser($id)
    {
        Factory('App\Models\UserDetail')->create([
            'user_id' => $id]);
        Factory('App\Models\UserUniform')->create([
            'user_id' => $id]);
        Factory('App\Models\UserVehicle')->create([
            'user_id' => $id]);
        Factory('App\Models\UserContacts', 3)->create([
            'user_id' => $id]);
        Factory('App\Models\UserLicense')->create([
            'user_id' => $id]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed some random Placements
        $placement = new Placement([
            'date' => now(),
            'vehicle' => '5770',
            'role' => 'medic',
        ]);
        $placement->save();
        $placement = new Placement([
            'date' => now(),
            'vehicle' => '7775',
            'role' => 'medic',
        ]);
        $placement->save();

        // Seed some random Training Courses
        //$this->call(TrainingCourseSeeder::class);

        // Seed Roles and Permissions
        $this->call(PermissionRoleSeeder::class);

        // Seed the standard Ranks
        //$this->call(RankSeeder::class);

        // Seed the standard user
        $this->call(UserSeeder::class);
        $this->call(UserRoleSeeder::class);

//        $user2 = Factory('App\Models\User')->create();
//        $this->SeedUser($user2->id);
    }
}
