<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Save;
use App\Models\Project;


class SaveController extends Controller
{
    //
    public function save(Request $request)
    {
        $userId = auth()->id(); // Récupérer l'ID de l'utilisateur authentifié

        $projectId = $request->input('project_id');

        // Vérifier si l'entrée existe déjà dans la table save
        $save = Save::where('user_id', $userId)->where('project_id', $projectId)->first();

        if ($save) {
            // Si l'entrée existe, supprimer la ligne de la table save
            $save->delete();
            return response('unsave');
        } else {
            // Si l'entrée n'existe pas, créer une nouvelle entrée dans la table save
            Save::create([
                'user_id' => $userId,
                'project_id' => $projectId,
            ]);
            return response('save');
        }
    }

    public function getSavedItems()
    {
        // Récupérer les projets sauvegardés par l'utilisateur authentifié avec les utilisateurs et les profils associés
        $projects = Project::whereHas('saves', function ($query) {
            $query->where('user_id', auth()->id());
        })
            ->with('user.profile')
            ->get();
        return view('feed.projects', compact('projects'));
    }
}
