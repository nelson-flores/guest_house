<?php

namespace App\Livewire\Admin\Auth;

use App\Models\Message;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Dto\UserUi\UserLoginDTO;
use App\Services\Auth\UserUI\UserAuthService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;


#[Layout("components.layouts.admin-auth", ['title' => "Login"])]
class Login extends Component
{

    //#[Url()]

    public string $user = '';

    public string $password = '';

    public bool $remember = false;

    public function login(): mixed
    {

        try {
            $this->validate([
                'user' => ["required", 'string', 'min:3', 'max:200'],
                'password' => ["required", 'string', 'min:1', 'max:50']
            ]);
    

            $authData = new UserLoginDTO($this->user, $this->password, $this->remember);

            $authService = new UserAuthService();

            // email
            if (filter_var($this->user, FILTER_VALIDATE_EMAIL)) {
                $authService->loginByEmail($authData);
            } else if (preg_match('/^\+?[0-9\s\-]{6,20}$/', $this->user)) {
                $authService->loginByPhoneNumber($authData);
            } else {
                $authService->loginByUserName($authData);
            }
    
        } catch (\Throwable $th) {
            //return $this->js('output.alert("Erro ao autenticar o usuário: ' . $th->getMessage() . '")');
            session()->flash('error', 'Erro ao autenticar o usuário: ' . $th->getMessage());
            return null;
        }
        

        $this->user = '';
        $this->password = '';
        $this->remember = false;

        //$this->js('output.notify("Usuario autenticado com sucesso.")');
        session()->flash('message', 'Usuario autenticado com sucesso.');



        return $this->redirectIntended(route('web.admin.index'));
    }
    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
