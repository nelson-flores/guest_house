<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Message;
use Livewire\Attributes\Computed; 
use Livewire\Attributes\Layout;
use Livewire\WithPagination;


#[Layout("components.layouts.admin",['title'=>"Eventos"])]
class Index extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.admin.events.index');
    }
    #[Computed]
    public function events()
    {
        return \App\Models\Event::latest()->paginate(10);
    }
    public function delete($id)
    {
        $event = \App\Models\Event::find($id);
        if ($event) {
            $event->delete();
            session()->flash('message', 'Evento deletado com sucesso!');
        } else {
            session()->flash('error', 'Evento não encontrado.');
        }
    }
}
