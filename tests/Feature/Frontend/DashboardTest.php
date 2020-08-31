<?php

namespace Tests\Feature\Frontend;

use App\Domains\Auth\Models\User;
use App\Models\UserDetails;
use Tests\TestCase;

/**
 * Class DashboardTest.
 */
class DashboardTest extends TestCase
{
    /** @test */
    public function only_authenticated_users_can_access_their_account()
    {
        $this->get('/dashboard')->assertRedirect('/login');

        $user = factory(User::class)->state('user')->create();
        $userdetails = factory(UserDetails::class)->create([
            'user_id' => $user->id,
        ]);
        $this->actingAs($user);
        $this->get('/dashboard')->assertOk();
    }
}
