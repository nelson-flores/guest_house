<?php

namespace App\Livewire\Admin\Events;


use App\Models\EventTaxonomy;
use Livewire\Component;
use App\Models\Event;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;


#[Layout("components.layouts.admin", ['title' => "Adicionar Evento"])]
class Add extends Component
{
    use WithFileUploads;
    public $name = null;
    public $slug = null;
    public $description = 'Mavuco, Nampula';
    public $type = null;
    public $edition_number = 1;
    public $start_date = null;
    public $end_date = null;


    public function save()
    {
        try {
            beginTransaction();

            // $thumbnail = 
            $event = Event::create([
                "name" => $this->name,
                "slug" => $this->slug ?? uniqid(),
                "description" => $this->description,
                "type" => $this->type,
                "edition_number" => $this->edition_number,
                "start_date" => $this->start_date,
                "end_date" => $this->end_date
            ]);


            session()->flash('message', 'Evento criado com sucesso!');

            $this->reset([
               'name',
               'slug',
               'description',
               'type',
               'end_date',
               'start_date',
               'edition_number' 
            ]);
            commitTransaction();

        } catch (\Throwable $th) {
            rollbackTransaction();
            session()->flash('error', $th->getMessage());
            return null;
        }
    }


    public function render()
    {
        return view('livewire.admin.events.add');
    }
}
