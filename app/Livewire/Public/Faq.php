<?php

namespace App\Livewire\Public;

use App\Helpers\Subcribers;
use Livewire\Component;

class Faq extends Component
{
    use Subcribers;
    public function render()
    {
        return view(
            'livewire.public.faq',
            [
                'faqs' => \App\Models\Faq::get()
            ]
        );
    }
}
