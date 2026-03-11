<?php

namespace App\Livewire\Public;

use App\Models\Message;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout("components.layouts.app", ['title' => "Contacto"])]
class Contact extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';
    
    public function render()
    {
        return view('livewire.public.contact');
    }
    public function submit()
    {
        // Validate the form data
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Message::create([
            'code'=>uniqid(),
            'subject'=>'Contacto',
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);


       session()->flash('success', 'Sua mensagem foi enviada com sucesso! Entraremos em contato em breve.');

    }
}
