<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required|string')]
    public string $title;

    #[Validate('required')]
    public $content, $meta_description, $meta_tags;

    #[Validate('required|image|mimes:webp|max:2048')]
    public $artwork;

    public function render()
    {
        return view('livewire.article.create');
    }

    public function save()
    {
        $this->validate();

        $article = Article::create([
            'title' => $this->title,
            'slug' => str($this->title)->slug(),
            'content' => $this->content,
            'meta_description' => $this->meta_description,
            'meta_tags' => $this->meta_tags,
            'artwork' => $this->artwork->storePublicly('artwork'),
        ]);

        session()->flash('flash.banner', 'Article created!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('article.edit', ['article' => $article]);
    }
}
