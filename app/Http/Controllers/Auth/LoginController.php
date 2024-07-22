<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirection après connexion réussie
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Gère la tentative de connexion
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::attempt($this->credentials($request))) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
}
