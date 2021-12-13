<?php

namespace App\Http\Livewire\Articles;

use Illuminate\Support\Facades\Auth;
use Lauthz\Facades\Enforcer;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        if (Enforcer::enforce((string)Auth::id(), "article", "read")) {
            return view('livewire.articles.index');
        }

        return abort(403);
    }
}
