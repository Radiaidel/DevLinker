<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Report;
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

        // Redirigez l'utilisateur vers la page précédente ou une autre page appropriée
        return redirect()->back()->with('success', 'Project reported successfully.');
    }
}
