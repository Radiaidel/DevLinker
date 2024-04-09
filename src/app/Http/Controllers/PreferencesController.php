<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
class PreferencesController extends Controller
{
    public function show()
    {
      
        return view('preferences.show');
    }

    public function updateName(Request $request)
    {
        auth()->user()->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Votre nom a été mis à jour avec succès.');
    }

    public function updateEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $token = Str::random(60);

        // Stockez temporairement le token dans la session.
        session(['email_verification_token' => $token]);

        // Stockez temporairement le nouvel e-mail dans la session.
        session(['new_email' => $request->email]);

        $verificationUrl = route('email.verify', ['token' => $token]);

        Mail::to($request->email)->send(new EmailVerification($verificationUrl));

        return redirect()->back()->with('success', 'Un e-mail de confirmation a été envoyé à votre nouvelle adresse e-mail.');
    }

    public function verifyEmail(Request $request, $token)
    {
        // Vérifiez si le token correspond à celui stocké temporairement.
        if ($token === session('email_verification_token')) {
            $user = auth()->user();
            $newEmail = session('new_email');

            // Mettez à jour l'adresse e-mail de l'utilisateur.
            $user->update([
                'email' => $newEmail,
            ]);

            // Effacez les données stockées temporairement.
            $request->session()->forget('email_verification_token');
            $request->session()->forget('new_email');

            return redirect()->route('preferences.show')->with('success', 'Votre adresse e-mail a été mise à jour avec succès.');
        }

        return redirect()->route('preferences.show')->with('error', 'Le lien de vérification est invalide.');
    }
    
    
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Vérifier l'ancien mot de passe
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Le mot de passe actuel est incorrect.');
        }

        // Valider les nouveaux mots de passe
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Mettre à jour le mot de passe
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Votre mot de passe a été mis à jour avec succès.');
    }
}
