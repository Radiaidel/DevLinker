<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

use App\Models\Project;
use App\Models\Notification;
use App\Notifications\NotificationProject;

class LikeController extends Controller
{
    //
    public function like(Request $request)
    {
        $userId = auth()->id(); // Récupérer l'ID de l'utilisateur authentifié

        $projectId = $request->input('project_id');

        $project = Project::findOrFail($projectId);


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

            $project->user->notify(new NotificationProject($projectId, $userId, 'like'));
        


            return response('like');
        }
    }
    public function viewLikes(Project $project)
    {

        $likes = $project->likes()->with('user.profile')->get();

        return response()->json(['likes' => $likes]);
    }
}
