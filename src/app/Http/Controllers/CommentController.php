<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Comment;


class CommentController extends Controller
{
    public function showComments($projectId)
    {
        // Récupérer le projet associé à l'ID
        $project = Project::findOrFail($projectId);

        // Récupérer tous les commentaires associés à ce projet
        $comments = $project->comments()->with('user')->get();

        // Passer les données à la vue et afficher les commentaires
        return view('feed.comment-show', compact('project', 'comments'));
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

        // Rediriger l'utilisateur ou retourner une réponse JSON
        // en fonction de vos besoins

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
