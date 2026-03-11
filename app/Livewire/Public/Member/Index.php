<?php

namespace App\Livewire\Public\Member;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout("components.layouts.app", ['title' => "Membros"])]
class Index extends Component
{
    public function render()
    {
        return view('livewire.public.member.index');
    }
}
