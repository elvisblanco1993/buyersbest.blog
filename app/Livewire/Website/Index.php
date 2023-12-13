<?php

namespace App\Livewire\Website;

use App\Models\Article;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.website.index', [
            'articles' => Article::whereNotNull('published_at')
                            ->orderBy('published_at', 'DESC')
                            ->paginate('16'),
        ]);
    }
}
