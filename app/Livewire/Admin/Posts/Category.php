<?php

namespace App\Livewire\Admin\Posts;


use App\Models\Taxonomy;
use Livewire\Component;
use App\Models\Message;
use Livewire\Attributes\Computed; 
use Livewire\Attributes\Layout;
use Livewire\WithPagination;


#[Layout("components.layouts.admin",['title'=>"Posts"])]
class Category extends Component
{
    use WithPagination;
    public $name = null;
    public $slug = null;

    public $excerpt = null;
    public $description = null;
    public function render()
    {
        return view('livewire.admin.posts.category');
    }
    #[Computed('')]
    public function categories(){
       return  Taxonomy::where('taxonomy_type','category')->latest()->paginate(10);
    }
    public function delete($id){
        Taxonomy::find($id)->delete();
    }
    public function save(){
        Taxonomy::create([
            'name'=> $this->name,
            'slug'=> $this->slug,
            'taxonomy_type'=> 'category',
            //'pare'
            ]);
    }
}
