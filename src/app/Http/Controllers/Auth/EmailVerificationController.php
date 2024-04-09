<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    //
    public function verify(Request $request, $token)
    {
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('preferences.show')->with('error', 'Token de vérification invalide.');
        }

        $user->update([
            'email_verified_at' => now(),
            'email_verification_token' => null,
        ]);

        return redirect()->route('preferences.show')->with('status', 'Votre adresse e-mail a été vérifiée avec succès.');
    }
}
