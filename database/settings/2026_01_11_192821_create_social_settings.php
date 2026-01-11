<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('social.site_facebook', null);
        $this->migrator->add('social.site_pinterest', null);
        $this->migrator->add('social.site_linkedin', null);
        $this->migrator->add('social.site_instagram', null);
    }
};
