<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectContent extends Model
{
    use HasFactory;

    protected $fillable = [
        "size",
        "style",
        "content",
        "source",
        "caption",
        "position"
    ];

    /**
     * Get the project that owns the content.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
