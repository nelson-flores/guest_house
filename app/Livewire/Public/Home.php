<?php

namespace App\Livewire\Public;

use App\Helpers\GoogleTranslator;
use App\Helpers\Subcribers;
use App\Models\Faq;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('components.layouts.home', ['title' => 'Pagina Inicial','style_two'=>true])]
class Home extends Component
{
    use GoogleTranslator;
    use Subcribers;

    #[Computed()]
    public function posts()
    {
        return Post::latest()->get();
    }
    #[Computed()]
    public function faqs()
    {
        return Faq::limit(5)->latest()->get();
    }
    public function render()
    {
        //$bem = $this->translate("bem vindo");

        //dd($bem);

        return view('livewire.public.home',[
        ]);
    }
}
