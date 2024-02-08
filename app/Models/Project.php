<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "hero",
        "thumb",
        "position",
        "status"
    ];

    protected $appends = ['slug'];

    /**
     * Retrieve the project using title instead of id.
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $formattedTitle = Str::headline($value);
        return $this->where('title', $formattedTitle)->firstOrFail();
    }

    /**
     *  Generate and get slugs for project from the title.
     */
    public function slug(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => strval(Str::of($this->title)->kebab()),
        );
    }

    /**
     * Get the content for the project.
     */
    public function content(): HasMany
    {
        return $this->hasMany(ProjectContent::class);
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
