<?php

namespace Database\Seeders;

use Lauthz\Facades\Enforcer;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Enforcer::addPolicy('administrator', 'section', 'create');
        Enforcer::addPolicy('administrator', 'section', 'read');
        Enforcer::addPolicy('administrator', 'section', 'update');
        Enforcer::addPolicy('administrator', 'section', 'delete');

        Enforcer::addPolicy('administrator', 'section', 'create');
        Enforcer::addPolicy('administrator', 'section', 'read');
        Enforcer::addPolicy('administrator', 'section', 'update');
        Enforcer::addPolicy('administrator', 'section', 'delete');

        Enforcer::addPolicy('administrator', 'article', 'create');
        Enforcer::addPolicy('administrator', 'article', 'read');
        Enforcer::addPolicy('administrator', 'article', 'update');
        Enforcer::addPolicy('administrator', 'article', 'delete');

        Enforcer::addPolicy('administrator', 'article', 'create');
        Enforcer::addPolicy('administrator', 'article', 'read');
        Enforcer::addPolicy('administrator', 'article', 'update');
        Enforcer::addPolicy('administrator', 'article', 'delete');

        Enforcer::addPolicy('editor', 'article', 'create');
        Enforcer::addPolicy('editor', 'article', 'read');
        Enforcer::addPolicy('editor', 'article', 'update');
        Enforcer::addPolicy('editor', 'article', 'delete');

        Enforcer::addPolicy('editor', 'article', 'create');
        Enforcer::addPolicy('editor', 'article', 'read');
        Enforcer::addPolicy('editor', 'article', 'update');
        Enforcer::addPolicy('editor', 'article', 'delete');
    }
}
