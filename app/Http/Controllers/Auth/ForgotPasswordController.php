<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Password as PasswordFacade;

class ForgotPasswordController extends Controller
{
    use ResetsPasswords;

    // Affiche le formulaire pour demander un réinitialisation de mot de passe
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Envoie le lien de réinitialisation du mot de passe
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $response = PasswordFacade::sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', __($response))
            : back()->withErrors(['email' => __($response)]);
    }
}
