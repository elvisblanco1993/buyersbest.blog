<?php

namespace App\Livewire\Tag;

use App\Models\Tag;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.tag.index', [
            'tags' => Tag::orderby('created_at', 'DESC')->get(),
        ]);
    }
}
