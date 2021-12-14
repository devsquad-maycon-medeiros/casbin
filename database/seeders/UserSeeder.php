<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Lauthz\Facades\Enforcer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::factory()->create(['email' => 'super-admin@devsquad.com']);

        Enforcer::addRoleForUser($superAdmin->id, 'super-admin');

        $administrator = User::factory()->create(['email' => 'team@devsquad.com']);

        Enforcer::addRoleForUser($administrator->id, 'administrator');

        $editor = User::factory()->create([
            'email' => 'editor@devsquad.com',
            'current_team_id' => $administrator->current_team_id
        ]);

        Enforcer::addRoleForUser($editor->id, 'editor');

        Enforcer::addPermissionForUser($editor->id, 'section', 'read');

        User::factory()->create(['email' => 'user@devsquad.com']);
    }
}
