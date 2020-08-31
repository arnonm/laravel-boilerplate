<?php

use App\Domains\Auth\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        User::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => 'secret',
            'email_verified_at' => now(),
            'active' => true,
        ]);

        if (app()->environment(['local', 'testing'])) {
            $this->SeedUser(1);

            $user = User::create([
                'type' => User::TYPE_USER,
                'name' => 'Test User',
                'email' => 'user@user.com',
                'password' => 'secret',
                'email_verified_at' => now(),
                'active' => true,
                'provider' => 'google',
                'provider_id' => '11',
            ]);
            $this->SeedUser($user->id);
        }

        $this->enableForeignKeys();
    }

    protected function SeedUser($id)
    {
        Factory('App\Models\UserDetails')->create([
            'user_id' => $id]);
        Factory('App\Models\UserUniform')->create([
            'user_id' => $id]);
        Factory('App\Models\UserVehicle')->create([
            'user_id' => $id]);
        Factory('App\Models\UserContact', 3)->create([
            'user_id' => $id]);
        Factory('App\Models\UserLicense')->create([
            'user_id' => $id]);


    }
}
