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
        $projects = Project::inRandomOrder()->get();
        $user = Auth::user();


        $relatedUserIds = $user->relatedUserIds();

        // Récupérer les utilisateurs qui ne sont pas dans la table friendrequests avec l'utilisateur authentifié
        $suggestedUsers = User::whereNotIn('id', $relatedUserIds)
            ->where('id', '!=', $user->id) 
            ->limit(4)
            ->get();

        // Passez les projets à la vue
        return view('feed.index', compact('projects' , 'suggestedUsers'));
    }



    public function explore()
    {
        $projects = Project::inRandomOrder()->get();
        
        return view('explore.index', compact('projects'));
    }
}
