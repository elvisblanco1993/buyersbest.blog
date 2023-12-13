<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    public function resetPagination()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.article.index', [
            'articles' => Article::where('title', 'like', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate(12),
        ]);
    }
}
