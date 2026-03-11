<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout("components.layouts.admin",['title'=>"Usuarios"])]
class Add extends Component
{
    public function render()
    {
        return view('livewire.admin.users.add');
    }
}
