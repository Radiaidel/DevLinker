<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class PreferencesController  extends Controller
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

        session(['email_verification_token' => $token]);

        session(['new_email' => $request->email]);

        $verificationUrl = route('email.verify', ['token' => $token]);

        Mail::to($request->email)->send(new EmailVerification($verificationUrl));

        return redirect()->back()->with('success', 'Un e-mail de confirmation a été envoyé à votre nouvelle adresse e-mail.');
    }

    public function verifyEmail(Request $request, $token)
    {
        if ($token === session('email_verification_token')) {
            $user = auth()->user();
            $newEmail = session('new_email');

            $user->update([
                'email' => $newEmail,
            ]);

            $request->session()->forget('email_verification_token');
            $request->session()->forget('new_email');

            return redirect()->route('preferences.show')->with('success', 'Votre adresse e-mail a été mise à jour avec succès.');
        }

        return redirect()->route('preferences.show')->with('error', 'Le lien de vérification est invalide.');
    }
    
    
    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $validator->errors()->add('old_password', 'Le mot de passe actuel est incorrect.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Votre mot de passe a été mis à jour avec succès.');
    }

    public function deleteAccount(Request $request)
    {
        if (!Hash::check($request->password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Le mot de passe est incorrect.');
        }

        auth()->user()->delete();

        return redirect()->route('auth.register')->with('success', 'Votre compte a été supprimé avec succès.');
    }
}
