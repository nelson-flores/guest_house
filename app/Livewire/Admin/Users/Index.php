<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout("components.layouts.admin", ['title' => "Usuarios"])]
class Index extends Component
{
    use WithPagination;

    #[Computed()]
    public function users()
    {
        return User::paginate(10);
    }
    public function render()
    {
        return view('livewire.admin.users.index');
    }
    public function delete($id)
    {

        try {
            $user = User::find($id);
            if ($user) {
                if ($user->id == user()->id) {
                    throw new \Exception("Nao pode apagar a si mesmo!", 400);

                }
                $user->delete();
            }
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
        }

    }
}
