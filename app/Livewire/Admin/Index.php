<?php

namespace App\Livewire\Admin;

use App\Models\Album;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout("components.layouts.admin",['title'=>"Painel de Controle"])]
class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.index');
    }
}
