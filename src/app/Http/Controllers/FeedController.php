<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class FeedController extends Controller
{
    public function index()
    {
        $projects = Project::inRandomOrder()->get();

        // Passez les projets à la vue
        return view('feed.index', compact('projects'));
    }
}
