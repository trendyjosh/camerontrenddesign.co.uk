<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProjectContentRequest;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class AdminProjectContentController extends Controller
{
    /**
     * Update the specified project with project content.
     * Check uploaded project content to see if it already exists on the project before 
     * updating it or creating as new.
     * Any project content previously on the project that is no longer present in the form 
     * submission will be deleted.
     */
    public function update(UpdateProjectContentRequest $request, Project $project): void
    {
        $formFields = $request->validated();
        // Prepare variables
        $updatedContents = new Collection;
        $newContents = new Collection;
        $position = 0;
        foreach ($formFields['content'] as $content) {
            // Upload image file
            if (isset($content['file'])) {
                $content['source'] = Project::uploadContentImage($content['file']);
            }
            // Set position
            $content['position'] = $position;
            if (isset($content['id'])) {
                // Update existing content
                $existingContent = $project->content()->updateOrCreate([
                    'id' => $content['id'],
                ], $content);
                $updatedContents->push($existingContent);
            } else {
                // Create new content
                $newProject = $project->content()->create($content);
                $newContents->push($newProject);
            }
            // Increment position
            $position++;
        }
        // Get all new and removed content
        $diffContent = $project->content->diff($updatedContents);
        foreach ($diffContent as $content) {
            if (!$newContents->contains($content)) {
                if ($content->source) {
                    // Delete image from storage
                    Storage::disk('public')->delete($content->source);
                }
                // Delete removed content
                $content->delete();
            }
        }
    }
}
