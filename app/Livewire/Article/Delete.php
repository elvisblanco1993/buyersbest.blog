<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class Delete extends Component
{

    public Article $article;

    public function render()
    {
        return view('livewire.article.delete');
    }

    public function delete()
    {
        $this->article->tags()->detach();
        $this->article->forceDelete();

        session()->flash('flash.banner', 'Article deleted!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('article.index');
    }
}
