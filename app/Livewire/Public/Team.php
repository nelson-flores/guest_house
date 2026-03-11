<?php

namespace App\Livewire\Public;

use Livewire\Component;

use Livewire\Attributes\Layout;


#[Layout('components.layouts.app', ['title' => 'Equipe CTA/CEP NAMPULA'])]
class Team extends Component
{
    public function render()
    {
        return view('livewire.public.team');
    }
}
