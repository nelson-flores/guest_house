<?php
namespace App\Services\Auth\AdminUi;

use App\Dto\AdminUi\AdminLoginDTO;
use Illuminate\Support\Facades\Auth;

class AdminAuthService
{

    /**
     * @param AdminLoginDTO $authData
     * @return void
     * @throws \Exception
     */
    public function loginByEmail(AdminLoginDTO $authData)
    {
        $success = Auth::guard('admin')->attempt(
            [
                'email' => $authData->username,
                'password' => $authData->password
            ],
            $authData->remember
        );


        if ($success == false) {
            throw new \Exception('Nao foi possivel autenticar o usuario, senha ou telefone incorretos');
        }
    }

    /**
     * @param AdminLoginDTO $authData
     * @return void
     * @throws \Exception
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->invalidate();
        session()->regenerateToken();
    }
}
