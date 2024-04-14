<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectPositionsRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $projects = Project::orderBy('status', 'desc')->orderBy('position', 'asc')->get();
        return Inertia::render('Project/Index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Project/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $formFields = $request->validated();

        // Get image upload file paths
        if (isset($formFields['hero'])) {
            $formFields['hero'] = Project::uploadHero($formFields['hero']);
        }
        if (isset($formFields['thumb'])) {
            $formFields['thumb'] = Project::uploadThumb($formFields['thumb']);
        }

        Project::create($formFields);
        return redirect()->route('admin.projects.index')->with('message', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project): Response
    {
        $project->load('content');
        return Inertia::render('Project/Show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): Response
    {
        $project->load('content');
        return Inertia::render('Project/Edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $formFields = $request->validated();

        // Allow empty subtitle
        if (!isset($formFields['sub_title'])) {
            $formFields['sub_title'] = null;
        }

        // Get image upload file paths
        $formFields['hero'] = isset($formFields['hero']) ? Project::uploadHero($formFields['hero']) : $project->hero;
        $formFields['thumb'] = isset($formFields['thumb']) ? Project::uploadThumb($formFields['thumb']) : $project->thumb;

        $project->update($formFields);

        return redirect()->route('admin.projects.show', [
            'project' => $project->slug
        ])->with('message', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        // Delete any project images
        Storage::disk('public')->delete($project->hero);
        // Delete the project
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Project deleted.');
    }

    /**
     * Show the project as it appears on the front-end site.
     */
    public function preview(Project $project): View
    {
        // Eager load project content
        $project->load('content');

        return view('project', [
            'project' => $project
        ]);
    }

    /**
     * Show the list of projects and reorder them.
     */
    public function editOrder(): Response
    {
        $projects = Project::where('status', 1)->orderBy('position', 'asc')->get();
        return Inertia::render('Project/Order', [
            'projects' => $projects
        ]);
    }

    /**
     * Update projects' positions with new values.
     */
    public function updateOrder(UpdateProjectPositionsRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        $position = 0;
        foreach ($formFields['projects'] as $formProject) {
            $project = Project::find($formProject['id']);
            $project->position = $position;
            $project->save();
            $position++;
        }
        return redirect()->route('admin.projects.index')->with('message', 'Project order updated successfully.');
    }
}
