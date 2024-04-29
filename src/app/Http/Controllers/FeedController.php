<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


class FeedController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);

        $friendIds = $user->relatedUserIds();
        $pendingFriends = $user->PendingRequests();

        $projects = Project::whereHas('user', function (Builder $query) {
            $query->whereNull('deleted_at'); 
        })
            ->orderBy('updated_at', 'desc')
            ->paginate(6);

        $suggestedUsers = User::whereNotIn('id', $friendIds->merge([$user->id]))
            ->whereNotIn('id', $pendingFriends->merge([$user->id]))
            ->limit(4)
            ->get();

        return view('feed.index', compact('projects', 'suggestedUsers'));
    }



    public function explore()
    {
        $projects = Project::whereHas('user', function (Builder $query) {
            $query->whereNull('deleted_at'); 
        })
            ->orderBy('updated_at', 'desc')
            ->paginate(6);

        return view('explore.index', compact('projects'));
    }


    public function loadMoreProjects(Request $request)
    {
        $projects = Project::whereHas('user', function (Builder $query) {
            $query->whereNull('deleted_at'); 
        })
        ->orderBy('updated_at', 'desc')->paginate(6);

        return view('feed.projects', compact('projects'));
    }
}
