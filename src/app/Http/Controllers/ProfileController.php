<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function updateCoverImage(Request $request)
    {

        // Validez la requête
        $request->validate([
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assurez-vous que le fichier est une image valide et de petite taille
        ]);

        // Récupérez le fichier envoyé par l'utilisateur
        $image = $request->file('cover_image');

        // Stockez le fichier dans le système de fichiers (par exemple, dans le dossier "storage/app/public")
        $imageName = 'cover_' . Auth::id() . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/profile', $imageName);

        // Mettez à jour le chemin de l'image de couverture dans la base de données pour l'utilisateur actuellement connecté
        Auth::user()->profile->update(['cover_image' => $imageName]);

        return redirect()->back()->with('success', 'Cover image updated successfully.');
    }
    public function updateProfileImage(Request $request)
    {

        // Validez la requête
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assurez-vous que le fichier est une image valide et de petite taille
        ]);

        // Récupérez le fichier envoyé par l'utilisateur
        $image = $request->file('profile_image');

        // Stockez le fichier dans le système de fichiers (par exemple, dans le dossier "storage/app/public")
        $imageName = 'profile_' . Auth::id() . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/profile', $imageName);

        // Mettez à jour le chemin de l'image de couverture dans la base de données pour l'utilisateur actuellement connecté
        Auth::user()->profile->update(['profile_image' => $imageName]);

        return redirect()->back()->with('success', 'You profile image updated successfully.');
    }
    
}
