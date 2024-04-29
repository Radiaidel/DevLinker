<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetCodeEmail; // Importez la classe de votre e-mail personnalisé

class PasswordResetController extends Controller
{

    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Email not found']);
        }

        $resetCode = mt_rand(100000, 999999);

        Mail::to($request->email)->send(new ResetCodeEmail($resetCode));

        return response()->json(['message' => 'Reset code sent successfully', 'reset_code' => $resetCode]);
        }


        public function updatePassword(Request $request)
        {
            $request->validate([
                'password' => 'required|min:6', 
            ]);
    
            $user = User::where('email', $request->email)->first();
            $user->password = bcrypt($request->password);
            $user->save();
    
            return response()->json(['success' => 'Mot de passe mis à jour avec succès']);
        }
}
