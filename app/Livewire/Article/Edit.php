<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Edit extends Component
{
    use WithFileUploads;

    #[Validate('required|string')]
    public string $title;

    #[Validate('required')]
    public $content, $meta_description, $meta_tags;

    #[Validate('nullable|image|mimes:webp|max:2048')]
    public $artwork;

    public Article $article;

    public function mount()
    {
        $this->title = $this->article->title;
        $this->content = $this->article->content;
        $this->meta_description = $this->article->meta_description;
        $this->meta_tags = $this->article->meta_tags;
    }

    public function render()
    {
        return view('livewire.article.edit');
    }

    public function save()
    {
        $this->validate();

        $this->article->update([
            'title' => $this->title,
            'slug' => str($this->title)->slug(),
            'content' => $this->content,
            'meta_description' => $this->meta_description,
            'meta_tags' => $this->meta_tags,
            'artwork' => $this->artwork ? $this->artwork->storepublicly('artwork') : $this->article->artwork,
        ]);

        session()->flash('flash.banner', 'Article saved!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('article.edit', ['article' => $this->article]);
    }
}
