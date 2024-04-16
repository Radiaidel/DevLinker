<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class FeedController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Récupérer les IDs des amis de l'utilisateur
        $friendIds = $user->relatedUserIds();
        $pendingFriends = $user->PendingRequests();
        // Récupérer les projets des amis de l'utilisateur, triés par la dernière date de mise à jour
        $projects = Project::whereIn('user_id', $friendIds)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        // Récupérer les utilisateurs suggérés (non amis de l'utilisateur et sans demande d'ami en attente)
        $suggestedUsers = User::whereNotIn('id', $friendIds->merge([$user->id]))
            ->whereNotIn('id', $pendingFriends->merge([$user->id]))
            ->limit(4)
            ->get();

        // Passez les projets et les utilisateurs suggérés à la vue
        return view('feed.index', compact('projects', 'suggestedUsers'));
    }



    public function explore()
    {
        $projects = Project::orderBy('updated_at', 'desc')
        ->get();

        return view('explore.index', compact('projects'));
    }
}
