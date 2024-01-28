<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Show the landing page.
     */
    public function index(Request $request): View
    {
        return view('index');
    }

    /**
     * Show the about page.
     */
    public function about(Request $request): View
    {
        return view('about');
    }

    /**
     * Show the services page.
     */
    public function services(Request $request): View
    {
        return view('services');
    }

    /**
     * Show the instagram posts page.
     */
    public function instagram(Request $request): View
    {
        //
    }

    /**
     * Show the contact page.
     */
    public function contact(Request $request): View
    {
        return view('contact');
    }
}
