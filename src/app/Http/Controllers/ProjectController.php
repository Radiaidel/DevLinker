<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{

    public function store(Request $request)
    {
        // dd($request->all());
        // Valider les données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour les images
            'video.*' => 'nullable|file|mimes:mp4,mov,avi,wmv|max:20480', // Validation pour les vidéos
            'links.*' => 'nullable|url', // Validation pour les liens
            'document.*' => 'nullable|file|mimes:pdf,doc,docx,txt|max:20480', // Validation pour les documents
        ]);


        // Créer un nouveau projet
        $project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->user_id = Auth::user()->id;

        $project->save();

        // Enregistrer les images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Renommer l'image et la stocker dans le répertoire approprié
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);

                // Créer une entrée dans la table des médias pour chaque image et l'associer au projet
                $media = new Media();
                $media->type = 'image';
                $media->path = $imageName;
                $project->media()->save($media);
            }
        }

        // Enregistrer les vidéos
        if ($request->hasFile('video')) {
            foreach ($request->file('video') as $video) {
                // Renommer la vidéo et la stocker dans le répertoire approprié
                $videoName = uniqid() . '.' . $video->getClientOriginalExtension();
                $video->storeAs('public/videos', $videoName);

                // Créer une entrée dans la table des médias pour la vidéo
                $media = new Media();
                $media->project_id = $project->id;
                $media->type = 'video';
                $media->path = $videoName;
                $media->save();
            }
        }

        // Enregistrer les documents
        if ($request->hasFile('document')) {
            foreach ($request->file('document') as $document) {
                // Obtenir le nom de fichier original
                $originalFileName = $document->getClientOriginalName();

                // Remplacer les espaces par des tirets bas
                $documentName = str_replace(' ', '_', $originalFileName);

                // Stocker le document dans le répertoire approprié avec le nom modifié
                $document->storeAs('public/documents', $documentName);

                // Créer une entrée dans la table des médias pour le document
                $media = new Media();
                $media->project_id = $project->id;
                $media->type = 'document';
                $media->path = $documentName;
                $media->save();
            }
        }


        if ($request->input('links') !== null) {
            // Parcourez les liens envoyés
            foreach ($request->input('links') as $link) {
                // Vérifiez si le lien n'est pas nul
                if ($link !== null) {
                    // Créez une nouvelle entrée Media pour chaque lien
                    $media = new Media();
                    $media->project_id = $project->id;
                    $media->type = 'link';
                    $media->path = $link;
                    $media->save();
                }
            }
        }



        // Rediriger vers une page de succès ou afficher un message de succès
        return redirect()->back()->with('success', 'Projet ajouté avec succès.');
    }

    public function search(Request $request)
    {
        // Récupérez le terme de recherche de la requête
        $searchTerm = $request->input('search');
    
        // Recherchez les projets correspondant au terme de recherche dans le titre ou la description
        $projects = Project::where('title', 'like', "%$searchTerm%")
            ->orWhere('description', 'like', "%$searchTerm%")
            ->get();
    
        // Retournez les projets à la vue
        return view('feed.projects', compact('projects'));
    }
    
}
