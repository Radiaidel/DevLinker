<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    //
    public function like(Request $request)
    {
        $userId = auth()->id(); // Récupérer l'ID de l'utilisateur authentifié

        $projectId = $request->input('project_id');
        // Vérifier si l'entrée existe déjà dans la table like
        $like = Like::where('user_id', $userId)->where('project_id', $projectId)->first();

        if ($like) {
            // Si l'entrée existe, supprimer la ligne de la table like (dislike)
            $like->delete();
            return response('dislike');
        } else {
            // Si l'entrée n'existe pas, créer une nouvelle entrée dans la table like (like)
            Like::create([
                'user_id' => $userId,
                'project_id' => $projectId,
            ]);
            return response('like');
        }
    }
}
