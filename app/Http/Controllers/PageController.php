<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Show the landing page.
     */
    public function index(Request $request): View
    {
        $projects = Project::where('status', 1)->orderBy('position', 'asc')->get();
        return view('index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the page.
     */
    public function show(Request $request, Page $page): View
    {
        return view(strtolower($page->title), [
            'page' => $page
        ]);
    }
    //
    //    /**
    //     * Show the instagram posts page.
    //     */
    //    public function instagram(Request $request): View
    //    {
    //        //
    //    }
}
