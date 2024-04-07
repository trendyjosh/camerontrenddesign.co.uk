<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Image;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "sub_title",
        "hero"
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
     * Handle hero image upload. The width of the image will be reduced to 
     * 1800px if too large and the resulting image will be optimised.
     */
    public static function uploadHero(UploadedFile $fileUpload): string | false
    {
        // Save image and get filepath
        $uploadedImage = $fileUpload->store('hero', 'public');
        if (!$uploadedImage) return false;
        // Resize and optimise the image
        $image = Image::load(storage_path('app/public') . "/" . $uploadedImage);
        $image->fit(Fit::Max, 1800)
            ->optimize()
            ->save();
        // Return filepath
        return $uploadedImage;
    }
}
