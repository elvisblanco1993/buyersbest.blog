<?php

namespace App\Livewire\Tag;

use App\Models\Article;
use App\Models\Tag;
use Livewire\Component;

class Attach extends Component
{
    public Article $article;

    public $modal;

    public $selected_tags = [];

    public string $search = '';

    public function mount()
    {
        $this->selected_tags = $this->article->tags->pluck('id')->toArray();
    }


    public function render()
    {
        return view('livewire.tag.attach', [
            'tags' => Tag::where('name', 'like', '%' . $this->search . '%')->get(),
        ]);
    }

    public function save()
    {

        $this->article->tags()->sync($this->selected_tags);

        session()->flash('flash.banner', 'Tags attached!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('article.edit', ['article' => $this->article]);
    }
}
