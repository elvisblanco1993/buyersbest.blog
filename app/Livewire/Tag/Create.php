<?php

namespace App\Livewire\Tag;

use App\Models\Tag;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Create extends Component
{
    #[Validate('required')]
    public string $name;

    public $modal;

    public function render()
    {
        return view('livewire.tag.create');
    }

    public function save()
    {
        Tag::create([
            'name' => $this->name,
            'slug' => str($this->name)->slug(),
        ]);

        session()->flash('flash.banner', 'Tag created!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('tag.index');
    }
}
