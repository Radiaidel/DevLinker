<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

use App\Models\Project;
use App\Models\Notification;
use App\Notifications\NotificationProject;
use App\Events\NotificationDeleted;

class LikeController extends Controller
{
    //
    public function like(Request $request)
    {
        $userId = auth()->id(); 

        $projectId = $request->input('project_id');

        $project = Project::findOrFail($projectId);


        $like = Like::where('user_id', $userId)->where('project_id', $projectId)->first();

        if ($like) {
            $like->delete();

            $notification = Notification::whereJsonContains('data', ['project_id' => $projectId, 'user_id' => $userId, 'type' => 'like'])
                ->first();

            if ($notification) {
                $notification->delete();
                event(new NotificationDeleted($project->user->id));
            }

            return response('dislike');
        } else {
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
