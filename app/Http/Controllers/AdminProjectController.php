<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $projects = Project::all();
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
        foreach (['hero', 'thumb'] as $projectImage) {
            if (isset($formFields[$projectImage])) {
                $formFields[$projectImage] = $request->file($projectImage)->store($projectImage, 'public');
            }
        }

        Project::create($formFields);
        return redirect()->route('admin.projects.index')->with('message', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project): Response
    {
        return Inertia::render('Project/Show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): Response
    {
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
        foreach (['hero', 'thumb'] as $projectImage) {
            if (isset($formFields[$projectImage])) {
                $formFields[$projectImage] = $request->file($projectImage)->store($projectImage, 'public');
            } else {
                $formFields[$projectImage] = $project->$projectImage;
            }
        }

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
}
