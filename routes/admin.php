<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminProjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

$resourceRouteOptions = [
    'as' => 'admin'
];

Route::prefix('admin')->group(function () use ($resourceRouteOptions) {
    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    // Authorised user routes
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () use ($resourceRouteOptions) {
        // Dashboard
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');
        // Site page management
        Route::resource('pages', AdminPageController::class, $resourceRouteOptions)->except([
            'create',
            'store',
            'destroy'
        ]);
        // Site project management
        Route::resource('projects', AdminProjectController::class, $resourceRouteOptions);
    });
});
