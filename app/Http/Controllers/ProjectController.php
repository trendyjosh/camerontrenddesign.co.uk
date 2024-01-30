<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Show the Wildlife garden project
     */
    public function wildlifeGarden(): View {
        return view('projects/wildlife-garden');
    }

    /**
     * Show the Barn conversion project
     */
    public function barnConversion(): View {
        return view('projects/barn-conversion');
    }

    /**
     * Show the Large garden project
     */
    public function largeGarden(): View {
        return view('projects/large-garden');
    }

    /**
     * Show the Small garden project
     */
    public function smallGarden(): View {
        return view('projects/small-garden');
    }

    /**
     * Show the Town garden project
     */
    public function townGarden(): View {
        return view('projects/town-garden');
    }
}
