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
        ->has('reports') // Filtrez les projets qui ont des rapports
        ->with(['reports.user:id,name']) // Inclure les utilisateurs associés aux rapports
        ->whereHas('user', function (Builder $query) {
            $query->whereNull('deleted_at'); // Exclure les utilisateurs supprimés
        })
        ->get();


        return view('admin.report', ['projects' => $projects]);
    }

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
