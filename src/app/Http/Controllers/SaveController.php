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
        $userId = auth()->id(); 

        $projectId = $request->input('project_id');

        $save = Save::where('user_id', $userId)->where('project_id', $projectId)->first();

        if ($save) {
            $save->delete();
            return response('unsave');
        } else {
            Save::create([
                'user_id' => $userId,
                'project_id' => $projectId,
            ]);
            return response('save');
        }
    }

    public function getSavedItems()
    {
        $projects = Project::whereHas('saves', function ($query) {
            $query->where('user_id', auth()->id());
        })
            ->with('user.profile')
            ->get();
        return view('feed.projects', compact('projects'));
    }
}
