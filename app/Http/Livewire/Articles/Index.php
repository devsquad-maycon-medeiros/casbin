<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Lauthz\Facades\Enforcer;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        if (Enforcer::enforce((string)Auth::id(), "article", "read")) {
            return view('livewire.articles.index', [
                'articles' => Article::paginate(10),
            ]);
        }

        return abort(403);
    }

    public function remove(Article $article)
    {
        $article->delete();
    }
}
