<?php

namespace App\Livewire\Public\Gallery;


use App\Models\Media;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout("components.layouts.app",['title'=>"Galeria"])]
class Index extends Component
{
    public function render()
    {
        $medias = Media::get();
        return view('livewire.public.gallery.index', compact('medias'));
    }
}
