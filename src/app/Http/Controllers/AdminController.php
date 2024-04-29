<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Visitor;
use App\Models\Media;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //
    public function dashboard()
    {

        //les visiteurs par jour
        $visitorsPerDay = Visitor::selectRaw('DATE(visited_at) as date')
            ->selectRaw('COUNT(DISTINCT ip_address) as total_visitors')
            ->groupByRaw('DATE(visited_at)')
            ->get();


        //count type de medias pour les projets 
        $mediaCounts = Media::select('type', DB::raw('count(distinct project_id) as project_count'))
            ->groupBy('type')
            ->get();



        // Calculer les pourcentages pour chaque type de média
        $mediaPercentages = [];

        $totalProjects = Media::distinct('project_id')->count();

        foreach ($mediaCounts as $mediaCount) {
            $percentage = ($mediaCount->project_count / $totalProjects) * 100;
            $mediaPercentages[$mediaCount->type] = $percentage;
        }

        $projectsPerDay = Project::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
            ->groupBy('date')
            ->get();



        $deletedUsers = User::onlyTrashed()->get();

        $totalVisitors = Visitor::distinct('ip_address')->count();

        $totalProjects = Project::count();

        $totalBlockedUsers = User::onlyTrashed()->count();

        $totalUsers = User::count();


        return view('admin.dashboard', compact('visitorsPerDay', 'mediaPercentages', 'projectsPerDay', 'deletedUsers', 'totalVisitors', 'totalProjects', 'totalBlockedUsers', 'totalUsers'));
    }

    public function getUsers()
    {
        $users = User::withTrashed()->get();
        return view('admin.users', compact('users'));
    }
}
