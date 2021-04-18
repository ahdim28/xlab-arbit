<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $service;

    use ValidatesRequests;

    public function __construct(
        AuthService $service
    )
    {
        $this->service = $service;
    }

    public function showLoginForm()
    {
        return view('auth.login', [
            'title' => 'Authentication required'
        ]);
    }

    public function login(LoginRequest $request)
    {
        $login = $this->service->login($request);

        if ($login == true) {
            return redirect()->route('dashboard')->with('success', 'Login succesfully');
        } else {
            return back()->with('failed', 'Username / Password wrong, Please try again !');
        }
    }

    public function logout()
    {
        $this->service->logout();
       
        return redirect()->route('login')->with('success', 'Logout successfully');
    }
}
