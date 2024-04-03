<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Page
{
    use HasFactory;

    /**
     * Create a new Eloquent model instance.
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Merge new fillable attributes
        $this->mergeFillable([
            "thumb",
            "position",
            "status"
        ]);
    }

    /**
     * Get the content for the project.
     */
    public function content(): HasMany
    {
        return $this->hasMany(ProjectContent::class)->orderBy('position', 'asc');
    }

    /**
     * Get next and previous projects.
     */
    public function getProjectLinks(): array
    {
        $links = [];
        $projects = Project::whereIn('position', [$this->position - 1, $this->position + 1])->get();
        foreach ($projects as $project){
            if($project->position < $this->position){
                $links['previous'] = $project;
            } else {
                $links['next'] = $project;
            }
        }
        return $links;
    }
}
