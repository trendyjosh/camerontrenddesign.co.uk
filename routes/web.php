<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PageController::class)->group(function () {
    // Landing page
    Route::get('/', 'index')->name('landing');
    // Show page
    Route::get('/{page}', 'show')->name('page');
});

Route::controller(EmailController::class)->group(function () {
    // Submit contact form
    Route::post('send-contact-form', 'sendContactForm')->name('send-contact-form');
});

Route::controller(ProjectController::class)->group(function () {
    // Show a project
    Route::get('/projects/{project}', 'show')->name('projects.show');
});
