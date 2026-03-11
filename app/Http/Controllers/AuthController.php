<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(){
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->route('web.public.home');
    }
}
