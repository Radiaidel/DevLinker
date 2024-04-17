<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Comment;
use App\Models\Notification;
use App\Notifications\NotificationProject;

class CommentController extends Controller
{
    public function showComments($projectId)
    {
        // Récupérer le projet associé à l'ID
        $project = Project::findOrFail($projectId);
    
        // Récupérer tous les commentaires associés à ce projet
        $comments = $project->comments()->with('user')->get();
    
        // Récupérer tous les autres projets
        $projects = Project::where('id', $projectId)->get();
    
        // Retourner la vue avec les données des projets, les commentaires et le projet lui-même
        return view('feed.comment-show', compact('project', 'projects', 'comments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        // Créer un nouveau commentaire associé à l'utilisateur authentifié
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();
        $comment->project_id = $request->input('project_id');

        $comment->save();

        $userId = auth()->id();
        $projectId = $request->input('project_id');
        $project = Project::findOrFail($projectId);



        $project->user->notify(new NotificationProject($projectId, $userId, 'comment'));




        // Rediriger l'utilisateur ou retourner une réponse JSON
        // en fonction de vos besoins

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
