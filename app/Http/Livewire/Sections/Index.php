<?php

namespace App\Http\Livewire\Sections;

use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Lauthz\Facades\Enforcer;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.sections.index', [
            'sections' => Section::paginate(10),
        ]);
    }

    public function remove(Section $section)
    {
        if (Enforcer::enforce((string)Auth::id(), "section", "delete")) {
            return $section->delete();
        }

        return abort(403);
    }
}
