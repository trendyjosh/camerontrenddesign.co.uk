<?php

namespace App\Providers;

use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Make settings available globally
        View::share('site_phone', app(GeneralSettings::class)->site_phone);
        View::share('site_email', app(GeneralSettings::class)->site_email);
    }
}
