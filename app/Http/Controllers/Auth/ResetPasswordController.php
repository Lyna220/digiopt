<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Affiche le formulaire pour réinitialiser le mot de passe
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // Réinitialise le mot de passe de l'utilisateur
    protected function reset(Request $request)
    {
        $this->validator($request->all())->validate();

        $response = Password::reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == Password::PASSWORD_RESET
            ? redirect($this->redirectPath())
            : back()->withErrors(['email' => [__($response)]]);
    }
}
