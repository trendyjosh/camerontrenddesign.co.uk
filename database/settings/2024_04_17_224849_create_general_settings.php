<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_phone', '07581 647855');
        $this->migrator->add('general.site_email', 'cameron.trend@gmail.com');
    }
};
