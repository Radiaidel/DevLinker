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

        $visitorsPerDay = Visitor::select(DB::raw('DATE(visited_at) as date'), DB::raw('COUNT(DISTINCT ip_address) as total_visitors'))
        ->groupBy('date')
        ->get();
    
            
        
        
        $mediaCounts = Media::select('type', DB::raw('count(distinct project_id) as project_count'))
        ->groupBy('type')
        ->get();
        
        // Initialiser un tableau pour stocker les pourcentages
        $mediaPercentages = [];
        
        $totalProjects = Media::distinct('project_id')->count(); // Nombre total de projets
        
        // Calculer les pourcentages pour chaque type de média
        foreach ($mediaCounts as $mediaCount) {
            $percentage = ($mediaCount->project_count / $totalProjects) * 100;
            $mediaPercentages[$mediaCount->type] = $percentage;
        }
        
        $projectsPerDay = Project::select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as total'))
        ->groupBy('date')
        ->get();



        $deletedUsers = User::onlyTrashed()->get();




        $totalVisitors = Visitor::distinct('ip_address')->count();


        // Récupérer le total des projets
        $totalProjects = Project::count();

        // Récupérer le total des utilisateurs bloqués
        $totalBlockedUsers = User::onlyTrashed()->count();

        // Récupérer le total des utilisateurs
        $totalUsers = User::count();


        return view('admin.dashboard', compact('visitorsPerDay' , 'mediaPercentages','projectsPerDay','deletedUsers','totalVisitors', 'totalProjects', 'totalBlockedUsers', 'totalUsers'));
    }

    public function getUsers()
    {
        $users = User::withTrashed()->get();
        return view('admin.users', compact('users'));
    }
}
