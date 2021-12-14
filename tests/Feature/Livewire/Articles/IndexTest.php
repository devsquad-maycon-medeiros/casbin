<?php

namespace Tests\Feature\Livewire\Articles;

use App\Http\Livewire\Articles\Index;
use App\Models\User;
use Lauthz\Facades\Enforcer;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /** @test */
    public function it_should_have_livewire_component()
    {
        $this->get(route('articles.index'))->assertSeeLivewire(Index::class);
    }

    /** @test */
    public function it_should_render_the_listing_page()
    {
        $this->get(route('articles.index'))->assertOk();
    }

    /** @test */
    public function it_should_not_render_the_page_without_an_admin_user()
    {
        $this->authenticateNotAdmin();

        $this->get(route('articles.index'))->assertForbidden();
    }

    /** @test */
    public function it_should_render_the_page_if_user_has_role()
    {
        $user = User::factory()->create();

        Enforcer::addPermissionForUser($user->id, 'article', 'read');

        $this->authenticate($user);

        $this->get(route('articles.index'))->assertOk();
    }
}
