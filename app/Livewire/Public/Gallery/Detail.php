<?php

namespace App\Livewire\Public\Gallery;

use App\Models\Media;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout("components.layouts.app",['title'=>"Galeria"])]
class Detail extends Component
{
    private $album = null;
    public function mount($slug)
    {
        $this->album = \App\Models\Album::where('slug', $slug)->firstOrFail();
        if (!$this->album) {
            abort(404);
        }
    }
    public function render()
    {
        $medias = Media::where('album_id', $this->album->id)->latest()->get();
        return view('livewire.public.gallery.detail', ['album' => $this->album, 'medias' => $medias]);
    }
}
