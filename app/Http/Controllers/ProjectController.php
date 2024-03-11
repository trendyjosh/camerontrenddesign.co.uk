<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Show the project.
     */
    public function show(Project $project): View {
        // Eager load project content
        $project->load('content');

        return view('project', [
            'project' => $project
        ]);
    }
}
