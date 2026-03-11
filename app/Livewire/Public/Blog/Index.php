<?php

namespace App\Livewire\Public\Blog;

use App\Models\Post;
use App\Models\Taxonomy;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;


#[Layout("components.layouts.app",['title'=>"Artigos"])]
class Index extends Component
{
    use WithPagination;

    public $search;

    public function mount(){
        $this->search = request("q");
    }

    #[Computed()]
    public function posts(){
        $query = Post::query();


        if ($this->search) {
            $query->where("title","like","%".$this->search."%");
            $query->orWhere("content","like","%".$this->search."%");
        }


        return $query->latest()->paginate(4);
    }

    #[Computed()]
    public function latest(){
        return Post::limit(5)->latest()->get();
    }
    
    #[Computed()]
    public function tags(){
        return Taxonomy::where('taxonomy_type','tag')->limit(200)->latest()->get();
    }

    #[Computed()]
    public function categories(){
        return Taxonomy::where('taxonomy_type','category')->limit(200)->latest()->get();
    }





    public function render()
    {
        return view('livewire.public.blog.index');
    }
}
