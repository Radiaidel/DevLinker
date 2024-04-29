<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Report;
use App\Events\ProjectReported;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ReportController extends Controller
{
    //

    public function getReport()
    {
        $projects = Project::withTrashed()
        ->has('reports') 
        ->with(['reports.user:id,name']) 
        ->whereHas('user', function (Builder $query) {
            $query->whereNull('deleted_at'); 
        })
        ->get();


        return view('admin.report', ['projects' => $projects]);
    }

    public function reportProject(Request $request)
    {

        $project = Project::findOrFail($request->input('projectId'));

        $report = new Report();
        $report->user_id = auth()->id(); 
        $report->project_id = $project->id;
        $report->status = 'pending'; 
        $report->save();
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            event(new ProjectReported($report, $admin->id));
        }
        return response()->json(['message' => 'Project reported successfully']);
    }
}
