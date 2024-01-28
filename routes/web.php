<?php

use App\Http\Controllers\PageController;
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
