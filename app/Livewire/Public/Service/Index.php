<?php

namespace App\Livewire\Public\Service;

use Livewire\Component;

use Livewire\Attributes\Layout;


#[Layout("components.layouts.app", ['title' => "Servicos"])]
class Index extends Component
{
    public function render()
    {
        return view('livewire.public.service.index');
    }
}
