<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthService
{
    public function login($request)
    {
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt($request->forms(), $remember)) {

            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return true;
    }
}