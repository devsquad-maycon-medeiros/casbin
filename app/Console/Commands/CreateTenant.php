<?php

namespace App\Console\Commands;

use App\Models\Organization;
use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new tenant';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = Str::slug($this->ask('Enter the tenant name.'));

        $organizations = Organization::all();

        $organization = $this->choice(
            'Select the organization this tenant belongs to.',
            $organizations->pluck('name')->all(),
        );

        $this->info("Creating tenant '$name'...");

        $tenant = Tenant::create([
            'id' => $name,
            'organization_id' => $organizations->firstWhere(
                'name',
                $organization
            )->id
        ]);

        $tenant->domains()->create(['domain' => "$name.localhost"]);

        $tenant->run(function () {
            $this->call('tenants:migrate', [
                '--seed' => true,
            ]);
        });

        $this->info("Tenant '$name' created successfully.");

        return 0;
    }
}
