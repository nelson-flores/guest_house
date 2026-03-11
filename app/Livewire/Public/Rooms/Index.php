<?php

namespace App\Livewire\Public\Rooms;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout("components.layouts.app", ['title' => "Quartos"])]
class Index extends Component
{
    public function render()
    {
        return view('livewire.public.rooms.index');
    }
}
