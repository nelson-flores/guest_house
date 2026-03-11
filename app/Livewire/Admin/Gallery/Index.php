<?php

namespace App\Livewire\Admin\Gallery;


use App\Models\Media;
use Livewire\Component;
use App\Models\Message;
use Livewire\Attributes\Computed; 
use Livewire\Attributes\Layout;


#[Layout("components.layouts.admin",['title'=>"Posts"])]
class Index extends Component
{


#[Computed("")]
public function photos()
{
    return Media::get();
}
    public function render()
    {
        return view('livewire.admin.gallery.index');
    }
}
