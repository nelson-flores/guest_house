<?php

namespace App\Livewire\Admin\Documents;


use App\Models\Document;
use Livewire\Component;
use App\Models\Message;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


#[Layout("components.layouts.admin", ['title' => "Documentos"])]
class Index extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name = null;
    public $file = null;
    public function render()
    {
        return view('livewire.admin.documents.index');
    }
    #[Computed('')]
    public function documents()
    {
        return Document::latest()->paginate(10);
    }
    public function delete($id)
    {
        Document::find($id)->delete();
    }
    public function save()
    {


        if ($this->file!==null) {
            $originalName = $this->file->getClientOriginalName();
            $extension = $this->file->getClientOriginalExtension();
            $path = $this->file->store('/', 'public');
        }else{
            abort(401);
        }


        Document::create([
            'name' => $this->name??$originalName,
            'file_path' => 'storage/'.$path,
            'extension'=>$extension,
            'original_name'=>$originalName,
            'is_public' => true,
            //'pare'
        ]);
    }

}
