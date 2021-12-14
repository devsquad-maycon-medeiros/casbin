<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'create articles',
            'read articles',
            'update articles',
            'delete articles',
            'create sections',
            'read sections',
            'update sections',
            'delete sections',
        ])->each(fn ($permission) => Permission::findOrCreate($permission));
    }
}
