<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use App\Models\Message;
use Livewire\Attributes\Computed; 
use Livewire\Attributes\Layout;
use Livewire\WithPagination;


#[Layout("components.layouts.admin",['title'=>"Artigos"])]
class Index extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.admin.posts.index');
    }
    #[Computed]
    public function posts()
    {
        return \App\Models\Post::with('author')->latest()->paginate(10);
    }
    public function delete($id)
    {
        $post = \App\Models\Post::find($id);
        if ($post) {
            $post->delete();
            session()->flash('message', 'Post deletado com sucesso!');
        } else {
            session()->flash('error', 'Post não encontrado.');
        }
    }
}
