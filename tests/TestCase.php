<?php

namespace Tests;

use App\Models\User;
use Database\Seeders\PolicySeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Lauthz\Facades\Enforcer;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(PolicySeeder::class);

        $this->authenticate();
    }

    public function authenticate(User $user = null)
    {
        if (!$user) {
            $user = User::factory()->create();

            Enforcer::addRoleForUser($user->id, 'administrator');
        }

        $this->user = $user;

        $this->actingAs($user);
    }

    public function authenticateNotAdmin(User $user = null)
    {
        if (!$user) {
            $user = User::factory()->create();
        }

        $this->authenticate($user);
    }
}
