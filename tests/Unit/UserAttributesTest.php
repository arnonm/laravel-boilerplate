<?php

namespace Tests\Unit;

use App\Domains\Auth\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Testing\File;
use Tests\TestCase;

class UserAttributesTest extends TestCase
{

    /** @test
     * Name: it_tests_avatar
     */
    public function it_tests_avatar()
    {
        $this->setupMedia();

        $user = factory(User::class)->create();
        factory(UserDetails::class)->create(['user_id' => $user->id]);
        $file = File::image('photo.jpg');

        $this->assertStringContainsString("https://gravatar.com/avatar/", $user->details->avatar_icon);

        $user->details->addMedia($file)->preservingOriginal()->toMediaCollection('avatars');
        $user->details = $user->details->fresh();

        $this->assertEquals($user->details->getFirstMediaUrl('avatars', 'thumb'), $user->details->avatar_icon);
    }

    private function setupMedia(): void
    {
        config()->set('filesystems.disks.media', [
            'driver' => 'local',
            'root' => __DIR__ . '/../../../storage', // choose any path...
        ]);

        config()->set('medialibrary.default_filesystem', 'media');
    }
}
