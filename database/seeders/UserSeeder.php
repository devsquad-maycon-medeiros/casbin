<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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

        $superAdmin->assignRole('Super Admin');

        $admin = User::factory()->create(['email' => 'team@devsquad.com']);

        $admin->assignRole('Admin');

        $writer = User::factory()->create([
            'email' => 'writer@devsquad.com',
            'current_team_id' => $admin->current_team_id
        ]);

        $writer->assignRole('Writer');

        User::factory()->count(100)->create();
    }
}
