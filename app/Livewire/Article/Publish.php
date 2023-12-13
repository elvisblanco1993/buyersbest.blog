<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class Publish extends Component
{
    public Article $article;

    public function render()
    {
        return view('livewire.article.publish');
    }

    public function publish()
    {
        $this->article->update([
            'published_at' => ($this->article->published_at) ? null : now()
        ]);

        session()->flash('flash.banner', 'Article published!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('article.edit', ['article' => $this->article]);
    }
}
