<?php

namespace App\Livewire\Admin\Posts;


use App\Models\PostTaxonomy;
use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;


#[Layout("components.layouts.admin", ['title' => "Novo Artigo"])]
class Add extends Component
{
    use WithFileUploads;
    public $title = null;
    public $slug = null;
    public $content = null;


    // Selecionadas no formulário
    public $selectedCategories = [];
    public $selectedTags = [];

    public $thumbnail = null;

    public $status = 'draft';

    #[Computed]
    public function categoriesList()
    {
        return \App\Models\Taxonomy::where('taxonomy_type', 'category')->get();
    }

    #[Computed]
    public function tagsList()
    {
        return \App\Models\Taxonomy::where('taxonomy_type', 'tag')->get();
    }

    public function save()
    {
        try {
            beginTransaction();

            // $thumbnail = 
            $post = Post::create([
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status,
                'slug' => $this->slug ?? uniqid($this->title),
                'thumbnail' => $this->thumbnail ? "storage/" . $this->thumbnail->store('/', 'public') : null,
                'author_id' => auth()->id(),
            ]);


            session()->flash('message', 'Post criado com sucesso!');

            commitTransaction();

        } catch (\Throwable $th) {
            rollbackTransaction();
            session()->flash('error', $th->getMessage());
            return null;
        }
    }


    public function render()
    {
        return view('livewire.admin.posts.add');
    }
}
