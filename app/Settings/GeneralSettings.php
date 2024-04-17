<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_phone;

    public string $site_email;

    public static function group(): string
    {
        return 'general';
    }
}
