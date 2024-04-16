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
        // Valider la requête
        $request->validate([
            'email' => 'required|email',
        ]);

        // Vérifier si l'e-mail existe dans la base de données
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // L'e-mail n'existe pas dans la base de données, retourner une erreur
            return redirect()->back()->withErrors(['error' => 'Email not found']);
        }

        // Générer un code de réinitialisation (vous pouvez utiliser une logique personnalisée pour générer un code unique)
        $resetCode = mt_rand(100000, 999999);

        // Envoyer l'e-mail avec le code de réinitialisation en utilisant votre classe personnalisée
        Mail::to($request->email)->send(new ResetCodeEmail($resetCode));

        // Répondre avec un message de succès
        return response()->json(['message' => 'Reset code sent successfully', 'reset_code' => $resetCode]);
        }


        public function updatePassword(Request $request)
        {
            // Valider la requête
            $request->validate([
                'password' => 'required|min:6', // Assurez-vous que votre validation correspond à vos besoins
            ]);
    
            // Mettre à jour le mot de passe de l'utilisateur authentifié
            $user = User::where('email', $request->email)->first();
            $user->password = bcrypt($request->password);
            $user->save();
    
            // Répondre avec un message de succès
            return response()->json(['success' => 'Mot de passe mis à jour avec succès']);
        }
}
