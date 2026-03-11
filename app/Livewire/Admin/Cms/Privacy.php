<?php

namespace App\Livewire\Admin\Cms;


use Livewire\Component;
use App\Models\Message;
use Livewire\Attributes\Computed; 
use Livewire\Attributes\Layout;


#[Layout("components.layouts.admin",['title'=>"Posts"])]
class Privacy extends Component
{
    public function render()
    {
        return view('livewire.admin.cms.privacy');
    }
}
