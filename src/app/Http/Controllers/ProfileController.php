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
    
    public function addExperience(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'companyName' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'nullable|date|after_or_equal:startDate',
            'about' => 'nullable|string',
            'location' => 'required|string|max:255',
            'companyImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Récupérer le profil de l'utilisateur authentifié
        $profile = auth()->user()->profile;
    
        // Récupérer les expériences existantes de l'utilisateur
        $experiences = $profile->experience ?? [];
        // Ajouter la nouvelle expérience au tableau des expériences existantes
        $newExperience = [
            'companyName' => $validatedData['companyName'],
            'position' => $validatedData['position'],
            'startDate' => $validatedData['startDate'],
            'endDate' => $validatedData['endDate'],
            'location' => $validatedData['location'],
            'about' => $validatedData['about'],
        ];
        
        // Enregistrer l'image de l'entreprise s'il a été téléchargé
        if ($request->hasFile('companyImage')) {
            $imagePath = $request->file('companyImage')->store('company_images', 'public');
            $newExperience['companyImage'] = $imagePath;
        }
        
        // Ajouter la nouvelle expérience à celles déjà existantes
        $experiences[] = $newExperience;
        
        // dd($experiences);
        // Mettre à jour le profil avec les nouvelles expériences
        $profile->update(['experience' => $experiences]);
    
        return redirect()->back()->with('success', 'Experience added successfully');
    }
    
    
}
