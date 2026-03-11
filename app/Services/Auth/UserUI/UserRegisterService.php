<?php
namespace App\Services\Auth\UserUI;

use App\Models\User;
use App\Dto\UserUi\UserRegisterDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterService
{

    public function __construct(public UserRegisterDTO $userRegisterDTO) {}

    public function createUser(): \Throwable | User
    {

        try {
            $user = User::query()->create([
                'code'=>uniqid(),
                'name' => $this->userRegisterDTO->name,
                'last_name' => $this->userRegisterDTO->last_name,
                'phone' => $this->userRegisterDTO->phone,
                'email' => $this->userRegisterDTO->email,
                'password' => Hash::make($this->userRegisterDTO->password)
            ]);
        } catch (\Throwable $th) {
            return throw $th;
        }

        
        try {
            Auth::loginUsingId($user->id);
        } catch (\Throwable $th) {
            return throw $th;
        }

        return $user;
    }
}
