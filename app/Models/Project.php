<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Image;

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
        foreach ($projects as $project) {
            if ($project->position < $this->position) {
                $links['previous'] = $project;
            } else {
                $links['next'] = $project;
            }
        }
        return $links;
    }

    /**
     * Handle thumbnail image upload. The image will be cropped to 400x400px 
     * and the resulting image will be optimised.
     */
    public static function uploadThumb(UploadedFile $fileUpload): string | false
    {
        $thumbnailSize = 400; // Height and width of thumnbnail
        // Save image and get filepath
        $uploadedImage = $fileUpload->store('thumb', 'public');
        if (!$uploadedImage) return false;
        // Get image
        $image = Image::load(storage_path('app/public') . "/" . $uploadedImage);
        // Determine if height or width should be resized
        $width = $height = null;
        if ($image->getWidth() > $image->getHeight()) {
            $height = $thumbnailSize;
        } else {
            $width = $thumbnailSize;
        }
        // Resize, crop and optimise the image
        $image->fit(Fit::Max, $width, $height)
            ->crop($thumbnailSize, $thumbnailSize, CropPosition::Center)
            ->optimize()
            ->save();
        // Return filepath
        return $uploadedImage;
    }

    /**
     * Handle content image upload. The image will be reduced to maximum
     * section width and the resulting image is optimised.
     */
    public static function uploadContentImage(UploadedFile $fileUpload): string | false
    {
        // Save image and get filepath
        $uploadedImage = $fileUpload->store('content', 'public');
        if (!$uploadedImage) return false;
        // Resize and optimise the image
        $image = Image::load(storage_path('app/public') . "/" . $uploadedImage);
        $image->fit(Fit::Max, 1250)
            ->optimize()
            ->save();
        // Return filepath
        return $uploadedImage;
    }
}
