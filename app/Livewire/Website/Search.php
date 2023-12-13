<?php

namespace App\Livewire\Website;

use App\Models\Article;
use Livewire\Component;

class Search extends Component
{
    public string $query = '';
    public $articles;

    public function render()
    {
        $this->articles = $this->search();
        return view('livewire.website.search');
    }

    public function search()
    {
        return Article::search($this->query)->take(20)->get();
    }
}
