<?php

namespace App\Livewire\Public;

use App\Helpers\Subcribers;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout("components.layouts.app",['title'=>"Politicas de Privacidade"])]
class Privacy extends Component
{
    use Subcribers;
    public function render()
    {
        return view('livewire.public.privacy');
    }
}
