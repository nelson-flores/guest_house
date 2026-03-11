<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app', ['title' => 'Sobre Nos'])]
class About extends Component
{
    public function render()
    {
        return view('livewire.public.about');
    }
}
