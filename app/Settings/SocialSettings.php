<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SocialSettings extends Settings
{
    public string|null $site_facebook;

    public string|null $site_pinterest;

    public string|null $site_linkedin;

    public string|null $site_instagram;

    public static function group(): string
    {
        return 'social';
    }
}
