<?php

namespace App\Livewire\Website;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class ShowArticle extends Component
{

    public $article;
    public array $metadata;

    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)
                            // ->whereNotNull('published_at')
                            ->firstOrFail();
        $this->metadata = [
            'title' => $this->article->title,
            'meta_tags' => $this->article->meta_tags,
            'meta_description' => $this->article->meta_description,
            'artwork' => $this->article->artwork,
            'published_at' => $this->article->published_at
        ];
    }

    // #[Title($this->article->title)]
    public function render()
    {
        return view('livewire.website.show-article')
            ->layout('layouts.guest', $this->metadata);
    }
}
