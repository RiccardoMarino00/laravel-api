<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    //
    public function index(Request $request){

        // $projects = Project::all();
        $results = Project::with('type', 'technologies')->paginate(6);

        return response()->json([
            'results' => $results
        ]);
    }

    public function show(Project $project) {

        $project->load('technologies', 'type');

        return response()->json([
            'project' => $project
        ]);
    }
}
