<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function show()
    {
        // Récupérez les données de l'utilisateur actuellement authentifié
        $user = auth()->user();

        // Retournez la vue du profil avec les données de l'utilisateur
        return view('profile.show', compact('user'));
    }
}
