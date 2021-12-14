<?php

namespace Tests\Feature\Livewire\Sections;

use App\Http\Livewire\Sections\Index;
use App\Models\User;
use Lauthz\Facades\Enforcer;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function it_should_have_livewire_component()
    {
        $this->get(route('sections.index'))->assertSeeLivewire(Index::class);
    }

    /** @test */
    public function it_should_render_the_listing_page()
    {
        $this->get(route('sections.index'))->assertOk();
    }

    /** @test */
    public function it_should_not_render_the_page_without_an_admin_user()
    {
        $this->authenticateNotAdmin();

        $this->get(route('sections.index'))->assertForbidden();
    }

    /** @test */
    public function it_should_render_the_page_if_user_has_role()
    {
        $user = User::factory()->create();

        Enforcer::addPermissionForUser($user->id, 'section', 'read');

        $this->authenticate($user);

        $this->get(route('sections.index'))->assertOk();
    }
}
