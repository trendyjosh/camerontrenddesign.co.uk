<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    /**
     * Get the content for the project.
     */
    public function content(): HasMany
    {
        return $this->hasMany(ProjectContent::class);
    }
}
