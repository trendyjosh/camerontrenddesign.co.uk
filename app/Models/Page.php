<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
}
