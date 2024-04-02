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

    public function updateExperience(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'editCompanyName' => 'required|string|max:255',
            'editPosition' => 'required|string|max:255',
            'editStartDate' => 'required|date',
            'editEndDate' => 'nullable|date|after_or_equal:editStartDate',
            'editAbout' => 'nullable|string',
            'editLocation' => 'required|string|max:255',
            'editCompanyImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Récupérer le profil de l'utilisateur authentifié
        $profile = auth()->user()->profile;

        // Récupérer les expériences existantes de l'utilisateur
        $experiences = $profile->experience ?? [];

        // Recherche de l'expérience à mettre à jour en fonction de la date de début
        foreach ($experiences as $key => $experience) {
            if ($experience['startDate'] == $request->editStartDate) {
                // Mettre à jour les champs de l'expérience
                $experiences[$key]['companyName'] = $validatedData['editCompanyName'];
                $experiences[$key]['position'] = $validatedData['editPosition'];
                $experiences[$key]['startDate'] = $validatedData['editStartDate'];
                $experiences[$key]['endDate'] = $validatedData['editEndDate'];
                $experiences[$key]['about'] = $validatedData['editAbout'];
                $experiences[$key]['location'] = $validatedData['editLocation'];

                // Mettre à jour l'image de l'entreprise si elle a été téléchargée
                if ($request->hasFile('editCompanyImage')) {
                    $imagePath = $request->file('editCompanyImage')->store('company_images', 'public');
                    $experiences[$key]['companyImage'] = $imagePath;
                }
                break; // Sortir de la boucle une fois que l'expérience a été mise à jour
            }
        }

        // Mettre à jour le profil avec les expériences mises à jour
        $profile->update(['experience' => $experiences]);

        return redirect()->back()->with('success', 'Experience updated successfully');
    }
    public function deleteExperience(Request $request)
    {


        // Trouver le profil de l'utilisateur authentifié
        $profile = auth()->user()->profile;

        // Récupérer les expériences existantes de l'utilisateur
        $experiences = $profile->experience ?? [];

        // Parcourir les expériences pour trouver celle à supprimer
        foreach ($experiences as $key => $experience) {
            if ($experience['startDate'] == $request->editStartDate) {
                // Supprimer l'expérience du tableau des expériences
                unset($experiences[$key]);
                break;
            }
        }

        // Mettre à jour le profil avec les expériences mises à jour
        $profile->update(['experience' => array_values($experiences)]);

        return redirect()->back()->with('success', 'Experience deleted successfully');
    }
    public function addEducation(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'institution' => 'required|string|max:255',
            'fieldOfStudy' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'nullable|date|after_or_equal:startDate',
            'description' => 'nullable|string',
            'schoolImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Récupérer le profil de l'utilisateur authentifié
        $profile = auth()->user()->profile;

        // Récupérer les éducations existantes de l'utilisateur
        $educations = $profile->education ?? [];

        // Ajouter la nouvelle éducation au tableau des éducations existantes
        $newEducation = [
            'institution' => $validatedData['institution'],
            'fieldOfStudy' => $validatedData['fieldOfStudy'],
            'startDate' => $validatedData['startDate'],
            'endDate' => $validatedData['endDate'],
            'description' => $validatedData['description'],
        ];

        // Enregistrer l'image de l'école s'il a été téléchargé
        if ($request->hasFile('schoolImage')) {
            $imagePath = $request->file('schoolImage')->store('school_images', 'public');
            $newEducation['schoolImage'] = $imagePath;
        }

        // Ajouter la nouvelle éducation à celles déjà existantes
        $educations[] = $newEducation;

        // Mettre à jour le profil avec les nouvelles éducations
        $profile->update(['education' => $educations]);

        return redirect()->back()->with('success', 'Education added successfully');
    }
    public function updateEducation(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'editInstitution' => 'required|string|max:255',
            'editFieldOfStudy' => 'required|string|max:255',
            'editStartDate' => 'required|date',
            'editEndDate' => 'nullable|date|after_or_equal:editStartDate',
            'editDescription' => 'nullable|string',
            'editSchoolImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        // Récupérer le profil de l'utilisateur authentifié
        $profile = auth()->user()->profile;

        // Récupérer les éducations existantes de l'utilisateur
        $educations = $profile->education ?? [];

        // Recherche de l'éducation à mettre à jour en fonction de la date de début
        foreach ($educations as $key => $education) {
            if ($education['startDate'] == $request->editStartDate) {
                // Mettre à jour les champs de l'éducation
                $educations[$key]['institution'] = $validatedData['editInstitution'];
                $educations[$key]['fieldOfStudy'] = $validatedData['editFieldOfStudy'];
                $educations[$key]['startDate'] = $validatedData['editStartDate'];
                $educations[$key]['endDate'] = $validatedData['editEndDate'];
                $educations[$key]['description'] = $validatedData['editDescription'];


                if ($request->hasFile('editSchoolImage')) {
                    $imagePath = $request->file('editSchoolImage')->store('school_images', 'public');
                    $educations[$key]['schoolImage'] = $imagePath;
                }


                break; // Sortir de la boucle une fois que l'éducation a été mise à jour
            }
        }

        // Mettre à jour le profil avec les éducations mises à jour
        $profile->update(['education' => $educations]);

        return redirect()->back()->with('success', 'Education updated successfully');
    }
    public function deleteEducation(Request $request)
{
    // Trouver le profil de l'utilisateur authentifié
    $profile = auth()->user()->profile;

    // Récupérer les éducations existantes de l'utilisateur
    $educations = $profile->education ?? [];

    // Parcourir les éducations pour trouver celle à supprimer
    foreach ($educations as $key => $education) {
        if ($education['startDate'] == $request->editStartDate) {
            // Supprimer l'éducation du tableau des éducations
            unset($educations[$key]);
            break;
        }
    }

    // Mettre à jour le profil avec les éducations mises à jour
    $profile->update(['education' => array_values($educations)]);

    return redirect()->back()->with('success', 'Education deleted successfully');
}

}
