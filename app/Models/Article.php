<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Image;

class Article extends Model
{
    protected $fillable = [
        "title",
        "image",
        "description",
        "link",
        "status",
    ];

    /**
     * Handle article image upload. The width of the image will be reduced to 
     * 180px if too large and the resulting image will be optimised.
     */
    public static function uploadImage(UploadedFile $fileUpload): string | false
    {
        // Save image and get filepath
        $uploadedImage = $fileUpload->store('article', 'public');
        if (!$uploadedImage) return false;
        // Resize and optimise the image
        $image = Image::load(storage_path('app/public') . "/" . $uploadedImage);
        $image->fit(Fit::Max, 180)
            ->optimize()
            ->save();
        // Return filepath
        return $uploadedImage;
    }
}
