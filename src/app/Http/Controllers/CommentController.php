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
        $project = Project::findOrFail($projectId);
    
        $comments = $project->comments()->with('user')->get();
    
        $projects = Project::where('id', $projectId)->get();
    
        return view('feed.comment-show', compact('project', 'projects', 'comments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();
        $comment->project_id = $request->input('project_id');

        $comment->save();

        $userId = auth()->id();
        $projectId = $request->input('project_id');
        $project = Project::findOrFail($projectId);



        $project->user->notify(new NotificationProject($projectId, $userId, 'comment'));


        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
