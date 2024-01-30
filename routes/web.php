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
    // about page
    Route::get('/about', 'about')->name('about');
    // Services page
    Route::get('/services', 'services')->name('services');
    // Contact page
    Route::get('/contact', 'contact')->name('contact');
});

Route::controller(EmailController::class)->group(function () {
    // Submit contact form
    Route::post('send-contact-form', 'sendContactForm')->name('send-contact-form');
});

Route::controller(ProjectController::class)->group(function () {
    // Wildlife garden project
    Route::get('wildlife-garden', 'wildlifeGarden')->name('wildlife-garden');
    // Barn garden project
    Route::get('barn-conversion', 'barnConversion')->name('barn-conversion');
    // Large garden project
    Route::get('large-garden', 'largeGarden')->name('large-garden');
    // Small garden project
    Route::get('small-garden', 'smallGarden')->name('small-garden');
    // Town garden project
    Route::get('town-garden', 'townGarden')->name('town-garden');
});
