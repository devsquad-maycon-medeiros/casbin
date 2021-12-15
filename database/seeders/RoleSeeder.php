<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect([
            'Super Admin',
            'Admin',
            'Writer',
        ])->map(fn ($role) => Role::findOrCreate($role))
            ->filter(fn ($role) => $role->name !== 'Super Admin');

        $articlePermissions = Permission::where('name', 'like', '%articles')->get()
            ->map->name;

        $writerRole = $roles->first(fn ($role) => $role->name === 'Writer');

        $writerRole->givePermissionTo(...$articlePermissions);

        $sectionPermissions = Permission::where('name', 'like', '%sections')->get()
            ->map->name;

        $roles->first(fn ($role) => $role->name === 'Admin')
            ->givePermissionTo(...$sectionPermissions, ...$articlePermissions);
    }
}
