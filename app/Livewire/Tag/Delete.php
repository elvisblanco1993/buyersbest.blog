<?php

namespace App\Livewire\Tag;

use App\Models\Tag;
use Livewire\Component;

class Delete extends Component
{
    public Tag $tag;

    public function render()
    {
        return view('livewire.tag.delete');
    }

    public function delete()
    {
        $this->tag->articles()->detach();
        $this->tag->delete();

        session()->flash('flash.banner', 'Tag deleted!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('tag.index');
    }
}
