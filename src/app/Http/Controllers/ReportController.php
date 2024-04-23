<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Report;
use App\Events\ProjectReported;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    //
    public function reportProject(Request $request)
    {

        $project = Project::findOrFail($request->input('projectId'));
        // Créez un rapport pour ce projet et cet utilisateur
        $report = new Report();
        $report->user_id = auth()->id(); // ID de l'utilisateur connecté
        $report->project_id = $project->id;
        $report->status = 'pending'; // Par défaut, le statut est 'pending'
        $report->save();
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            event(new ProjectReported($report, $admin->id));
        }
        return response()->json(['message' => 'Project reported successfully']);
    }
}
