<?php

use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminGeneralSettingsController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminProjectContentController;
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
        return redirect()->route('login');
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
        Route::controller(AdminProjectController::class)->group(function () {
            Route::get('projects/re-order', 'editOrder')->name('admin.projects.edit-order');
            Route::put('projects/re-order', 'updateOrder')->name('admin.projects.update-order');
            Route::get('projects/{project}/preview', 'preview')->name('admin.projects.preview');
        });
        Route::resource('projects', AdminProjectController::class, $resourceRouteOptions);
        // Site project content management
        Route::controller(AdminProjectContentController::class)->group(function () {
            Route::put('projects/{project}/contents', 'update')->name('admin.projects.contents.update');
        });
        // Site settings
        Route::controller(AdminGeneralSettingsController::class)->group(function () {
            Route::get('settings', 'show')->name('admin.settings.show');
            Route::put('settings', 'update')->name('admin.settings.update');
        });
        // Press article management
        Route::resource('articles', AdminArticleController::class, $resourceRouteOptions)->except([
            'destroy'
        ]);
    });
});
