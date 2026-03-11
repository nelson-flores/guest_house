<?php

namespace App\Livewire\Admin\Settings;


use Livewire\Component;
use App\Models\Message;
use Livewire\Attributes\Computed; 
use Livewire\Attributes\Layout;


#[Layout("components.layouts.admin",['title'=>"Posts"])]
class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.settings.index');
    }
}
