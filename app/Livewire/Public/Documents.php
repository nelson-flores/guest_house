<?php

namespace App\Livewire\Public;

use App\Models\Document;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;


#[Layout("components.layouts.app",['title'=>"Documentos"])]
class Documents extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.public.documents');
    }
    #[Computed('')]
    public function documents(){
        return Document::latest()->paginate(10);
    }
    public function download($id){
        $document = Document::find($id);
        return response()->download(public_path($document->file_path), $document->original_name);
    }
}
